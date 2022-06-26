<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IllustratorBook extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'illustrator_id'
    ];
}
