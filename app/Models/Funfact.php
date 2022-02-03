<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funfact extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'title',
        'counter_number',
        'user_id',
        'status'
    ];
}
