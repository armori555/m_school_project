<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable= [
        'name'
    ];

        public function teachers() { 
        return $this->hasMany(Teacher::class); 
}
        public function groups() { 
        return $this->hasMany(Group::class); 
}
        public function studentlanguages() { 
        return $this->hasMany(Studentlanguage::class); 
}
}
