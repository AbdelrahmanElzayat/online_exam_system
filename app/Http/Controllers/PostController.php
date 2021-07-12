<?php

namespace App\Http\Controllers;

use App\course;
use App\Exam;
use App\file;
use App\meeting;
use App\post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(course $course)
    {
        $link= meeting::latest()->first();
        return view('cateogry.showonecource',[
            'tweets'=>$course->posts,
            'data'=> $course->files,
            'exams'=>$course->exams,
            'course'=>$course,
            'key'=>1,
            'zoom_link'=> $link
        ]);
    }
   
    public function store()
    {   
        $attribues= request()->validate(['body'=>'required|max:255']);
        $post=post::create([
            'user_id'=>auth()->id(),
            'body'=>$attribues['body'],
        ]);
        $course=course::findOrFail(request('course_id'));
        $post->assignCourse($course);
        return back();
    }
    public function assignUser()
    {   
        $attribues= request()->validate(['name'=>'required|max:255|exists:users,email']);
        $course= course::findOrFail(request('course_id'));
        $user= User::where('email',request('name'))->first();
        if ($user) {
            $course->assignUser($user);
        }
        return back();
    }
    public function createzoom()
    {
        $x = new meeting();
        $x->link=request('zoom_url');
        $x->save();
        return redirect(request('zoom_url'));
    }

}
