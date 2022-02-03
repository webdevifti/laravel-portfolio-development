<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'site_logo',
        'site_description',
        'copyright_text',
        'site_keyword'
    ];
}
