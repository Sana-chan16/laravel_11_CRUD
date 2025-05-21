<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppUserModel extends Authenticatable
{
    protected $table = 'app-users';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'user_fname',
        'user_lname',
        'user_password',
    ];

    protected $hidden = ['user_password']; 

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function getNameAttribute()
{
    return $this->user_fname . ' ' . $this->user_lname;
}
}