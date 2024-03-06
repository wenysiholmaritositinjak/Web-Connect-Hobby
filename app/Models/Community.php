<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $table =('community');

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'description',
        'whatsapp',

    ];
}
