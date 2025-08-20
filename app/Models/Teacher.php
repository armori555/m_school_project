<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable= [
        "name",
        "family_name",
        'language_id'
    ];
    public function language() { 
        return $this->belongsTo(Language::class);
    }
}
