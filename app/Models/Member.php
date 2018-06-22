<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Member extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $table = 'mst_members';

    protected $fillable = [
      'member_code',
      'name','photo',
      'DOB','email',
      'address',
      'status',
      'proof_name',
      'proof_photo',
      'gender',
      'contact',
      'emergency_contact',
      'health_issues',
      'pin_code',
      'occupation',
      'aim',
      'source'
    ];

    protected $dates = ['created_at', 'updated_at', 'DOB'];

    public function allMembers()
    {
      $members = DB::table('mst_members')->get();
      return $members;
    }

   	public function addMember($data)
   	{
   		$id = DB::table('mst_members')->insertGetId($data);
        return $id;
   	}

   	//Relationships
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    // Media i.e. Image size conversion
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 50, 'h' => 50, 'q' => 100, 'fit' => 'crop'])
             ->performOnCollections('profile');

        $this->addMediaConversion('form')
             ->setManipulations(['w' => 70, 'h' => 70, 'q' => 100, 'fit' => 'crop'])
             ->performOnCollections('profile', 'proof');
    }
}
