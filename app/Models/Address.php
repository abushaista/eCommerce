<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'address_label',
        'address_detail',
        'optional_notes',
        'receipient_name',
        'mobile_no',
        'province',
        'city',
        'district',
        'sub_district',
        'postal_code',
        'pin_point',
    ];
}
