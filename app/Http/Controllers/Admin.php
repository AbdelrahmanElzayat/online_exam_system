<?php

namespace App\Http\Controllers;

use App\course;
use Illuminate\Http\Request;
use App\ex_category;
use App\ex_exam_master;
use App\ex_students;
use App\ex_portal;
use App\ex_exam_question_master;
use App\Exam;
use App\question;
use App\role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Admin extends Controller
{
    public function admin(){
        return view('Admin.dashboard');
    }

//############################################### category #########################################################//

//******************************************** view category
    public function exam_category(){
        $role= auth()->user()->role->map->label->first();
        if ($role === 'admin') {
             $ex_category = course::latest()->get();
        }else{
            $ex_category = auth()->user()->courses;
        }
        
        return view('Admin.exam_category',compact('ex_category'));
    }
//******************************************** insert category
    public function addNewCategory(Request $request){
        $s= $request->validate([
            'name'=>'required'
        ]);
            $cat = new course();
            course::create([
                'name'=>$request->name,
                'status'=>1
                ]);
                return redirect()->route('exam_category')->with('msg','success');

    }
//******************************************** delete category
    public function deleteCategory($id){
        $course = course::findOrFail($id)->delete();
        return redirect(route('exam_category'));
    }
//******************************************** update category
    public function editCategory($id){
        $ex_category = course::findOrFail($id);
        return view('Admin.editCategory',compact('ex_category'));
    }

  public function updateCategory(Request $request){
    $request->validate([
        'name'=>'required'
    ]);
    $ex_category = course::findOrFail($request->id)->update([
    'name'=>$request->name,
    ]);
    return redirect()->route('exam_category')->with('msg','success');
}
//******************************************** category status
public function category_status($id){
    $ex_category = course::where('id',$id)->get()->first();
    if($ex_category->status==1){
        $status=0;
    }else{
        $status=1;
    }
    $ex_category1 = course::where('id',$id)->get()->first();
    $ex_category1->status=$status;
    $ex_category1->update();
}

//############################################### exams #########################################################//

//******************************************** view exams
public function manage_exam(){
    $courses = course::latest()->get();
    $exams = Exam::latest()->get();
        return view('Admin.manage_exam',[
            'exams' =>$exams,
            'courses'=>$courses
        ]);
}

//******************************************** insert exams
public function addNewExam(Request $request){

   $s= $request->validate([
        'title'=>'required',
        'category'=>'required',
        'exam_date'=>'required'
    ]);
    
       $exam = Exam::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'exam_date'=>$request->exam_date,
            'status'=>1
            ]);
          $x=  course::findOrFail($request->category);
          $x->assignExam($exam);
            return redirect()->route('manage_exam')->with('msg','success'); 
}

//******************************************** exams status
public function exam_status($id){
    $ex_exam_master = Exam::where('id',$id)->get()->first();
    if($ex_exam_master->status==1){
        $status=0;
    }else{
        $status=1;
    }
    $ex_exam_master1 = Exam::where('id',$id)->get()->first();
    $ex_exam_master1->status=$status;
    $ex_exam_master1->update();
}

//******************************************** delete exams
public function delete_exam($id){
    $ex_exam_master = Exam::findOrFail($id)->delete();
    return redirect(route('manage_exam'));
}

//******************************************** update exams
public function edit_exam($id){
    $ex_category = course::latest()->where('status','1')->get();
    $ex_exam_master = Exam::findOrFail($id);
    return view('Admin.edit_exam',compact('ex_exam_master'),compact('ex_category'));
}
public function update_exam(Request $request){
    $request->validate([
        'title'=>'required','category'=>'required','exam_date'=>'required'
    ]);
    $ex_exam_master = Exam::findOrFail($request->id);
    $ex_exam_master->update([
        'title'=>$request->title,
        'category'=>$request->category,
        'exam_date'=>$request->exam_date,
    ]);
    $x = course::findOrFail($request->category);
    // dd($ex_exam_master);
    $ex_exam_master->updateCourse($x);
    return redirect()->route('manage_exam')->with('msg','success');
}

//############################################### questions in exams ###############################################//

//******************************************** view questions
public function add_question(Exam $id){
    $questions = $id->questions; 
    return view('Admin.add_question' , compact('questions'));
}

//******************************************** insert questions

public function addNewQuestion(Request $request){   
    $request->validate([
        'question'=>'required','option1'=>'required','option2'=>'required','option3'=>'required','option4'=>'required','ans'=>'required'
    ]);  
        $manage_question = new  question();
        $y =  question::create([
            'question'=>$request->question,
            'ans'=>$request->ans,
            'option'=>json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4)),
            'status'=>1
            ]);
            $x = Exam::findOrFail($request->exam_id);
            $x->assignQuestion($y);
            return redirect()->route('add_question',$request->exam_id)->with('msg','success');
}

//******************************************** questions status
public function question_status($id){
    $ex_exam_question_master = question::where('id',$id)->get()->first();
    if($ex_exam_question_master->status==1){
        $status=0;
    }else{
        $status=1;
    }
    $ex_exam_master1 = question::where('id',$id)->get()->first();
    $ex_exam_master1->status=$status;
    $ex_exam_master1->update();
}

//******************************************** delete questions
public function delete_question($id){
    $ex_exam_question_master = question::where('id','=',$id)->get()->first();
    $ex_exam_question_master->delete();
    return back();
}

//******************************************** update questions
public function edit_question($id){
    $ex_exam_question_master = question::where('id','=',$id)->get();
return view('Admin.edit_question',compact('ex_exam_question_master'));
}

public function updateQuestion(Request $request){
    $request->validate([
        'question'=>'required',
        'option1'=>'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
        'ans' => 'required',
    ]);
    $question = question::where('id','=',$request->id)->get()->first();

        $question->question=$request->question;
        $question->ans=$request->ans;
        $question->option=json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,
                                      'option3'=>$request->option3,'option4'=>$request->option4));
        $question->update();
return redirect()->route('add_question',$question->exams->map->id->first());
}



//############################################### Students #########################################################//

//******************************************** view students
public function students(){
        $ex_students = User::all();
        return view('Admin.students',compact('ex_students'));
}

//******************************************** insert students
public function add_students(Request $request){
    $request->validate([
        'name'=>'required','email'=>'required','password'=>'required'
    ]);
            $ex_students = new  User();
       $y =  User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            ]);
        $x = role::where('label','student')->first();
        $y->assignRole($x);
            return redirect()->route('students')->with('msg','success');
    }
//******************************************** delete students
public function delete_student($id){
    $ex_students = User::findOrFail($id)->delete();
    return redirect(route('students'));
}

//******************************************** update students
public function edit_student($id){
    // $ex_exam_master = ex_exam_master::where('status','1')->get();
    $ex_students = User::findOrFail($id);
    return view('Admin.edit_student',compact('ex_students'));
}
public function update_student(Request $request){
    $request->validate([
        'name'=>'required','email'=>'required','password'=>'required'
    ]);
    
    $ex_students = User::findOrFail($request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
    ]);
    return redirect()->route('students')->with('msg','success');
}


//############################################### manage_portal #########################################################//

//******************************************** view portals
public function manage_portal(){
    $ex_portal = User::all();
    return view('Admin.manage_portal',compact('ex_portal'));
}

//******************************************** insert portals
public function add_portal(Request $request){
    $request->validate([
        'name'=>'required','email'=>'required','password'=>'required'
    ]);
      $y =   User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            ]);
            $x = role::where('label','portal')->first();
            $y->assignRole($x);
            return redirect()->route('manage_portal')->with('msg','success');
        }

//******************************************** delete portals
public function delete_portal($id){
    $ex_portal = User::findOrFail($id)->delete();
    return redirect(route('manage_portal'));
}

//******************************************** update portals
public function edit_portal($id){
    $ex_portal = User::findOrFail($id);
    return view('Admin.edit_portal',compact('ex_portal'));
}
public function update_portal(Request $request){
    $request->validate([
        'name'=>'required','email'=>'required','password'=>'required'
    ]);
    
    $ex_portal = User::findOrFail($request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
    ]);
    return redirect()->route('manage_portal')->with('msg','success');

    // echo json_encode(array('status'=>'true','message'=>'updated success','reload'=>url('Admin.manage_portal')));
}


//############################################### End Admin #########################################################//


public function Result_student()
{
 return view('__Result_student');   
}
}