<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\Member;
use App\Models\Setting;
use File;
use App\Http\Helpers\Utilities;
use DB;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $member_obj = new Member();
        $members = $member_obj->allMembers();
        return view('members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //Get Numbering mode
        $member_number_mode = Utilities::getSetting('member_number_mode');

        //Generating Member Counter
        if ($member_number_mode == 1) {
            $memberCounter = Utilities::getSetting('member_last_number') + 1;
            $memberPrefix = Utilities::getSetting('member_prefix');
            $member_code = $memberPrefix.$memberCounter;
        } else {
            $member_code = '';
            $memberCounter = '';
        }

        return view('members.add',compact('member_code', 'memberCounter', 'member_number_mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Member Model Validation
        $this->validate($request, ['email' => 'unique:mst_members,email',
                                   'contact' => 'unique:mst_members,contact',
                                    ]);
        // Start Transaction
        DB::beginTransaction();
        try{
            // Store member's personal details
            $memberData = ['name'=>$request->name,
                                    'DOB'=> $request->DOB,
                                    'gender'=> $request->gender,
                                    'contact'=> $request->contact,
                                    'emergency_contact'=> $request->emergency_contact,
                                    'health_issues'=> $request->health_issues,
                                    'email'=> $request->email,
                                    'address'=> $request->address,
                                    'proof_name'=> $request->proof_name,
                                    'member_code'=> $request->member_code,
                                    'status'=> $request->status,
                                    'pin_code'=> $request->pin_code,
                                    'occupation'=> $request->occupation,
                                    'aim'=> $request->aim,
                                    'source'=> $request->source, 
                    ];

            $member = new Member($memberData);
            $member->createdBy()->associate(\Auth::user());
            $member->updatedBy()->associate(\Auth::user());
            $member->save();

            //Adding media i.e. Profile & proof photo
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $file_name = 'profile_'.$member->id.'.'.$request->photo->getClientOriginalExtension();
                list($width, $height, $type, $attr) = getimagesize($file);
                $dimention = ($width < $height)? $width : $height;
                $file->move('profiles', $file_name);
                $this->create_square_image(url('profiles/'.$file_name),$file_name,$dimention);
                File::move($file_name,'profiles/'.$file_name);
                $member->update(['photo' => $file_name]);
            }

            if ($request->hasFile('proof_photo')) {
                $file = $request->file('proof_photo');
                $file_name = 'proof_'.$member->id.'.'.$request->photo->getClientOriginalExtension();
                $file->move('proofs', $file_name);
                $member->update(['proof_photo' => $file_name]);
            }

            //Updating Numbering Counters
            Setting::where('key', '=', 'member_last_number')->update(['value' => $request->memberCounter]);


            DB::commit();
            flash()->success('Member was successfully created');
            return redirect(action('MembersController@show', ['id' => $member->id]));

        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Error while creating the member '.$e);

            return redirect(action('MembersController@index'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $member_number_mode = Utilities::getSetting('member_number_mode');
        $member_code = $member->member_code;

        return view('members.edit', compact('id','member', 'member_number_mode', 'member_code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->update($request->all());

        if ($request->hasFile('photo')) {
            $member->clearMediaCollection('profile');
            $member->addMedia($request->file('photo'))->usingFileName('profile_'.$member->id.$request->photo->getClientOriginalExtension())->toCollection('profile');
        }

        if ($request->hasFile('proof_photo')) {
            $member->clearMediaCollection('proof');
            $member->addMedia($request->file('proof_photo'))->usingFileName('proof_'.$member->id.$request->proof_photo->getClientOriginalExtension())->toCollection('proof');
        }

        $member->updatedBy()->associate(Auth::user());
        $member->save();

        flash()->success('Member details were successfully updated');

        return redirect(action('MembersController@show', ['id' => $member->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function countByStatus($status){

    }



    public function create_square_image($original_file, $destination_file=NULL, $square_size = 96)
    {
        
        if(isset($destination_file) and $destination_file!=NULL){
            if(!is_writable($destination_file)){
                echo '<p style="color:#FF0000">Oops, the destination path is not writable. Make that file or its parent folder wirtable.</p>'; 
            }
        }
        
        // get width and height of original image
        $imagedata = getimagesize($original_file);
        $original_width = $imagedata[0];    
        $original_height = $imagedata[1];
        
        if($original_width > $original_height){
            $new_height = $square_size;
            $new_width = $new_height*($original_width/$original_height);
        }
        if($original_height > $original_width){
            $new_width = $square_size;
            $new_height = $new_width*($original_height/$original_width);
        }
        if($original_height == $original_width){
            $new_width = $square_size;
            $new_height = $square_size;
        }
        
        $new_width = round($new_width);
        $new_height = round($new_height);
        
        // load the image
        if(substr_count(strtolower($original_file), ".jpg") or substr_count(strtolower($original_file), ".jpeg")){
            $original_image = imagecreatefromjpeg($original_file);
        }
        if(substr_count(strtolower($original_file), ".gif")){
            $original_image = imagecreatefromgif($original_file);
        }
        if(substr_count(strtolower($original_file), ".png")){
            $original_image = imagecreatefrompng($original_file);
        }
        
        $smaller_image = imagecreatetruecolor($new_width, $new_height);
        $square_image = imagecreatetruecolor($square_size, $square_size);
        
        imagecopyresampled($smaller_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
        
        if($new_width>$new_height){
            $difference = $new_width-$new_height;
            $half_difference =  round($difference/2);
            imagecopyresampled($square_image, $smaller_image, 0-$half_difference+1, 0, 0, 0, $square_size+$difference, $square_size, $new_width, $new_height);
        }
        if($new_height>$new_width){
            $difference = $new_height-$new_width;
            $half_difference =  round($difference/2);
            imagecopyresampled($square_image, $smaller_image, 0, 0-$half_difference+1, 0, 0, $square_size, $square_size+$difference, $new_width, $new_height);
        }
        if($new_height == $new_width){
            imagecopyresampled($square_image, $smaller_image, 0, 0, 0, 0, $square_size, $square_size, $new_width, $new_height);
        }
        

        // if no destination file was given then display a png      
        if(!$destination_file){
            imagepng($square_image,NULL,9);
        }
        
        // save the smaller image FILE if destination file given
        if(substr_count(strtolower($destination_file), ".jpg")){
            imagejpeg($square_image,$destination_file,100);
        }
        if(substr_count(strtolower($destination_file), ".gif")){
            imagegif($square_image,$destination_file);
        }
        if(substr_count(strtolower($destination_file), ".png")){
            imagepng($square_image,$destination_file,9);
        }

        imagedestroy($original_image);
        imagedestroy($smaller_image);
        imagedestroy($square_image);

    }
}
