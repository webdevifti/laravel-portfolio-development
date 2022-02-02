<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'social_icon',
        'social_url',
        'status',
        'user_id'
    ];
}
