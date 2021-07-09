<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ex_portal extends Model
{
    protected $table = "ex_portals";
    protected $primaryKey = "id";
    protected $fillable = ['name','email','mobile_no','password','status'];
}
