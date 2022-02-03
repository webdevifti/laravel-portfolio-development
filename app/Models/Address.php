<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_title',
        'title',
        'description',
        'office_name',
        'office_physical_address',
        'phone_number',
        'email_address'
    ];
}
