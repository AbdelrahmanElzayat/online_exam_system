<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $guarded=[];
    public function results()
    {
        return $this->belongsToMany(Result::class)->withTimestamps();
    }
    public function assignResult(Result $result)
    {
        $this->results()->save($result);
    }
    public function get_user()
    {
        $results = $this->results;
        for ($i=0; $i < count($results); $i++) { 
             if ($results[$i]['user_id']=== auth()->user()->id) {
                return $results[$i];
        }
           
        }
       
    }
    public function courses()
    {
        return $this->belongsToMany(course::class)->withTimestamps();
    }
    public function assignCourses(course $course)
    {
        $this->courses()->save($course);
    }
    public function updateCourse(course $course)
    {
        $this->courses()->sync($course);
    }

    public function questions()
    {
        return $this->belongsToMany(question::class)->withTimestamps();
    }
    public function assignQuestion(question $course)
    {
        $this->questions()->save($course);
    }
    
}
