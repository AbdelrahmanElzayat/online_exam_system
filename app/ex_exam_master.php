<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ex_exam_master extends Model
{
    protected $table = "ex_exam_masters";
    protected $primaryKey = "id";
    protected $fillable = ['title','category','exam_date','status'];
}
