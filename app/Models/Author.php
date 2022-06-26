<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthday',
        'bio',
    ];

    public function books() {
        return $this->belongsToMany('App\Models\Book', 'author_books');
    }
}
