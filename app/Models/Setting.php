<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'trn_settings';

    protected $fillable = [
            'key',
            'value',
    ];

    const CREATED_AT = null;
}
