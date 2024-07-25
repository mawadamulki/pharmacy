<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Order extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'status',
        'payment_status'
    ];

    public function medicines(){
        //order-medicine
        return $this->belongsToMany(Medicine::class, 'order_medicine', 'order_id','medicine_id');
    }
}
