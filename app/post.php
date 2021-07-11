<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
protected $guarded=[];
public function user()
{
    return $this->belongsTo(User::class);
}
public function courses()
    {
        return $this->belongsToMany(course::class)->withTimestamps();
    }
    public function assignCourse(course $course)
    {
        $this->courses()->save($course);
    }
}
