<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable= [
        "name",
        "language_id",
        "level"
    ];
    public function language() { 
        return $this->belongsTo(Language::class);
    }
    public function studentlanguages() { 
        return $this->hasMany(Studentlanguage::class); 
}
}
