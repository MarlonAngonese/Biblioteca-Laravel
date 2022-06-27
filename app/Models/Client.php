<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'birthday',
        'email',
        'password',
        'username'
    ];

    public function purchases() {
        return $this->hasMany("App\Models\Purchase");
    }
}
