<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable= [
        "amount",
        "payment_date",
        'studentlanguage_id'
    ];


        public function studentlanguage() { 
        return $this->belongsTo(Studentlanguage::class);
    }
    
}
