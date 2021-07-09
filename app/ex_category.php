<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ex_category extends Model
{
    protected $table = "ex_categories";
    protected $primaryKey = "id";
    protected $fillable = ['name','status'];
}
