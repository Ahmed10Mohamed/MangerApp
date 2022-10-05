<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Scopes\GeneralScope;
class Client extends Authenticatable
{
    use HasApiTokens, HasFactory,SoftDeletes;
    public function counter()
    {
        return $this->hasMany('App\Models\UserCounter', 'user');
    }
    public function city_info()
    {
        return $this->belongsTo('App\Models\City', 'city');
    }
    public function state_info()
    {
        return $this->belongsTo('App\Models\State', 'state');
    }
    public function images(){
        return $this->hasMany('App\Models\ImageArtista','user');
    }
    public function services(){
        return $this->hasMany('App\Models\AddService','user');
    }
    public function scopeArtistaInfo($quarry){
        return $quarry->where('artista',1);
    }
    // protected static function booted()
    // {
    //     static::addGlobalScope(new GeneralScope);
    // }
}
