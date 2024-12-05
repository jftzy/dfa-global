<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'book_title',
        'author',
        'translator',
        'language',
        'title_of_book_and_link',
        'year_of_translation',
        'publisher'
    ];
}
