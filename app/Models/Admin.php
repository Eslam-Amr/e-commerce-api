<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens,HasFactory, Notifiable;
protected $table = 'users';
protected static function boot(){
    parent::boot();
    static::addGlobalScope('admin',function(Builder $bulder){
        $bulder->where('role','admin');
    });
}}
