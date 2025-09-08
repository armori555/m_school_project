<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable= [
        'image',
        'name',
        "family_name",
        "birth_date",
        "adress",
        "phone_number",
        "email"
    ];
        public function studentlanguages() { 
        return $this->hasMany(Studentlanguage::class); 
}
}
