<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $guarded=[];
    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withTimestamps()->latest();
    }
    public function assignExam(Exam $course)
    {
        $this->exams()->save($course);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function assignUser(User $user)
    {
        $this->users()->save($user);
    }
    public function posts()
    {
        return $this->belongsToMany(post::class)->withTimestamps()->latest();
    }
    public function assignPost(post $post)
    {
        $this->posts()->save($post);
    }
    public function files()
    {
        return $this->belongsToMany(file::class)->withTimestamps()->latest();
    }
    public function assignfiles(file $file)
    {
        $this->files()->save($file);
    }
}
