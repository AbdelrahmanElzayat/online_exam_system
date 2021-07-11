<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
     public function courses()
    {
        return $this->belongsToMany(course::class)->withTimestamps()->latest();
    }
    public function assigncourses(course $file)
    {
        $this->courses()->save($file);
    }
}
