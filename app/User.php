<?php

namespace App;

use Courses;
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
    public function getAvatarAttribute()
    {
        return 'https://i.pravatar.cc/200?u=' . $this->email;
    }
    public function timeline()
    {
        return Post::Where('user_id',$this->id)
        ->latest()
        ->get();
    }
    public function Post()
    {
        return $this->hasMany(Post::class)->latest();
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }
    public function assignCourse(Course $course)
    {
        $this->courses()->save($course);
    }
}
