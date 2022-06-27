<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_method',
        'total',
        'status',
        'client_id',
    ];

    public function client() {
        return $this->belongsTo("App\Models\Client");
    }

    public function books() {
        return $this->belongsToMany('App\Models\Book', 'purchase_books');
    }
}
