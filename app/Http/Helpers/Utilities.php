<?php

namespace App\Http\Helpers;

use App\Models\Setting;
use Illuminate\Http\Request;

class Utilities
{
    public static function setActiveMenu($uri, $isParent = false)
    {
        $class = ($isParent) ? 'active open' : 'active';

        return \Request::is($uri) ? $class : '';
        //return \Request::is($uri);
    }

    // Get Setting
    public static function getSetting($key)
    {
        $settingValue = Setting::where('key', '=', $key)->pluck('value');
        return $settingValue[0];
    }

    //get Settings
    public static function getSettings()
    {
        $settings = Setting::all();
        $settings_array = [];

        foreach ($settings as $setting) {
            $settings_array[$setting->key] = $setting->value;
        }
        return $settings_array;
    }
    // Member Status
    public static function getStatusValue($status)
    {
        switch ($status) {
        case '0':
            return 'Inactive';
            break;

        case '2':
            return 'Archived';
            break;

        default:
            return 'Active';
            break;
    }
    }
}   