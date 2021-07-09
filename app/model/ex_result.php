<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ex_result extends Model
{
    protected $table = "ex_results";
    protected $primaryKey = "id";
    protected $fillable = ['exam_id','user_id','yes_ans','no_ans','result_json'];
}
