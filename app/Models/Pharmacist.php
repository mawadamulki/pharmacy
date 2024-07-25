<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticateContract;
use App\Models\Order;
use App\Models\Favorite;

use Laravel\Passport\HasApiTokens; //added

class Pharmacist extends Model implements AuthenticateContract
{
    use HasFactory, HasApiTokens ,Authenticatable;

    public $timestamps = false;

    protected $fillable = ["name","phone_num","password","role"];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }

}
