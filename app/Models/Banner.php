<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_title',
        'title',
        'description',
        'banner_image',
        'status',
        'user_id'
    ];
}
