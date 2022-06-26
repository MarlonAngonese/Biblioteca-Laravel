<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'author_id'
    ];
}
