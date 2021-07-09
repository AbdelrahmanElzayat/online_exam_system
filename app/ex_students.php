<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ex_students extends Model
{
    protected $table = "ex_students";
    protected $primaryKey = "id";
    protected $fillable = ['name','email','mobile_no','dob','exam','password','status'];
}
