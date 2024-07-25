<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Favorite;

class Medicine extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_medicine', 'medicine_id', 'order_id');
    }

    public function favorites(){
        return $this->belongsToMany(Favorite::class, 'favorites_medicines', 'medicine_id', 'favorite_id');
    }

    protected $fillable = [
        'scientific_name',
        'commercial_name',
        'classification',
        'manufacturer',
        'available_quantity',
        'expiration_date',
        'price',

    ];
}
