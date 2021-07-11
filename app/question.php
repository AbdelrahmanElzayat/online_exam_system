<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $guarded=[];
    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withTimestamps();
    }
    public function assignExam(Exam $exam)
    {
        $this->exams()->save($exam);
    }
}
