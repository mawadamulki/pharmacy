<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;
use App\Models\Pharmacist;

class Favorite extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'pharmacist_id'
    ];

    public function medicines(){
        //favorite-medicine
        return $this->belongsToMany(Medicine::class, 'favorites_medicines', 'favorite_id','medicine_id');
    }

    public function pharmacist() {
        return $this->belongsTo(Pharmacist::class); 
      }
    
}
