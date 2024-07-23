<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class Seller extends Model
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $table = 'users';
    // public function products(){
    //     return $this->hasMany(Product::class);
    // }
    protected static function boot(){
        parent::boot();
        static::addGlobalScope('seller',function(Builder $bulder){
            $bulder->where('role','seller');
        });
    }

    // public function profits()
    // {
    //     return $this->hasMany(Profit::class);
    // }
}
