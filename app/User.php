<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
         return $this->belongsToMany(role::class)->withTimestamps();
    }
    public function user_role()
    {
         return $this->role[0]->label;
    }
    public function assignRole(role $role)
    {
        $this->role()->sync($role);
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withTimestamps();
    }
    public function assignExam(Exam $exam)
    {
        $this->exams()->save($exam);
    }
}
