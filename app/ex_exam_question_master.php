<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ex_exam_question_master extends Model
{
    protected $table = "ex_exam_question_masters";
    protected $primaryKey = "id";
    protected $fillable = ['exam_id','question','ans','option','status'];
}
