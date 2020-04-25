<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'api_token'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static function getAdmin(){
        return static::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
            'api_token' => Str::random(60),
            'type_user_id' => 1
        ]);
    }

    public static function getUser(){
        return static::firstOrCreate([
            'email' => 'user@gmail.com',
        ], [
            'name' => 'Usuario',
            'email' => 'user@gmail.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
            'api_token' => Str::random(60),
            'type_user_id' => 2
        ]);
    }
}
