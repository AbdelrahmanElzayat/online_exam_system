<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $guarded=[];
    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withTimestamps();
    }
    public function assignExam(Exam $course)
    {
        $this->exams()->sync($course);
    }
}
