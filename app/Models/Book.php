<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'edition',
        'image_url',
        'category_id',
        'publisher_id',
        'language_id'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function publisher() {
        return $this->belongsTo('App\Models\Publisher');
    }

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }

    public function authors() {
        return $this->belongsToMany("App\Models\Author", "author_books");
    }

    public function purchases() {
        return $this->belongsToMany("App\Models\Purchase", "purchase_books");
    }

    public function illustrators() {
        return $this->belongsToMany("App\Models\Illustrator", "illustrator_books");
    }
}
