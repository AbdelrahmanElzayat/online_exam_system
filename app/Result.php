<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Result extends Model
{
    //
    protected $guarded=[];
    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withTimestamps();
    }
    public function get_degree()
    {
        return $this->exams->map->users;
    }
    public function get_user()
    {
        return $this->results->map->user_id;
    }
     public function get_user_email($id)
    {
        return User::findOrFail($id)->email;
    }
}
