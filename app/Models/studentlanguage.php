<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studentlanguage extends Model
{
    protected $fillable= [
        'language_id',
        "group_id",
        "student_id"
    ];
    public function language() { 
        return $this->belongsTo(Language::class);
    }
        public function group() { 
        return $this->belongsTo(Group::class);
    }
            public function student() { 
        return $this->belongsTo(Student::class);
    }
    
    public function payment() { 
    return $this->hasMany(Payment::class); 
}
}
