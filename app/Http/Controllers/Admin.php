<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ex_category;
use App\ex_exam_master;
use App\ex_students;
use App\ex_portal;
use App\ex_exam_question_master;
use App\Exam;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Admin extends Controller
{
    public function admin(){
        return view('Admin.dashboard');
    }
    public function exam_category(){
        $ex_category = ex_category::orderBy('id','desc')->get();
        return view('Admin.exam_category',compact('ex_category'));
    }
    public function addNewCategory(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required']);
        if($validator->fails()){
            $arr = array('status'=>'false','message'=>$validator->errors()->all);
        }else{
            $cat = new ex_category();
            ex_category::create([
                'name'=>$request->name,
                'status'=>1
                ]);
                $arr = array('status'=>'true','message'=>'success','reload'=>url('Admin.exam_category'));
                // return redirect(route('exam_category'));
        }
        echo json_encode($arr);
    //    if($request->passes()){
    //     $cat = new ex_category();
    //     $cat->name = $request->name;
    //     $cat->status=1;
    //     $cat->save();
    //     $arr = array('status'=>true,'message'=>'success','reload'=>route('exam_category'));
    //    }else{
    //        $arr = array('status'=>false,'message'=>$request->errors()->all);
    //    }
    }
    public function deleteCategory($id){
        $ex_category = ex_category::findOrFail($id)->delete();
        return redirect(route('exam_category'));
    }
    public function editCategory($id){
        $ex_category = ex_category::findOrFail($id);
        return view('Admin.editCategory',compact('ex_category'));
    }

  //upadate chef 
  public function updateCategory(Request $request){
    $request->validate([
        'name'=>'required'
    ]);
    $ex_category = ex_category::findOrFail($request->id)->update([
    'name'=>$request->name,
    ]);
    // $ex_category = ex_category::where('id',$request->id)->get()->first();
    // $ex_category->name=$request->name;
    // $ex_category->update();
    echo json_encode(array('status'=>'true','message'=>'updated success','reload'=>url('Admin.exam_category')));
}
public function category_status($id){
    $ex_category = ex_category::where('id',$id)->get()->first();
    if($ex_category->status==1){
        $status=0;
    }else{
        $status=1;
    }
    $ex_category1 = ex_category::where('id',$id)->get()->first();
    $ex_category1->status=$status;
    $ex_category1->update();
}

//******************************************** manage exams ************************************************************//
public function manage_exam(){
    $ex_category = ex_category::orderBy('id','desc')->where('status','1')->get();
    $manage_ex = Exam::select(['exams.*','ex_categories.name as cat_name'])->
                                 join('ex_categories','exams.category','=','ex_categories.id')->
                                orderBy('id','desc')->get();
        return view('Admin.manage_exam',compact('ex_category'),compact('manage_ex'));
}
public function addNewExam(Request $request){
    // $validator = Validator::make($request->all(),['title'=>'required','category'=>'required','exam_date'=>'required']);
   $s= $request->validate([
        'title'=>'required',
        'category'=>'required',
        'exam_date'=>'required'
    ]);
    
        
        Exam::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'exam_date'=>$request->exam_date,
            'status'=>1
            ]);
            return redirect()->route('manage_exam')->with('msg','success');
           
    
}
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
public function delete_exam($id){
    $ex_exam_master = Exam::findOrFail($id)->delete();
    return redirect(route('manage_exam'));
}
public function edit_exam($id){
    $ex_category = ex_category::orderBy('id','desc')->where('status','1')->get();
    $ex_exam_master = Exam::findOrFail($id);
    return view('Admin.edit_exam',compact('ex_exam_master'),compact('ex_category'));
}
public function update_exam(Request $request){
    $request->validate([
        
        'title'=>'required','category'=>'required','exam_date'=>'required'
    ]);
    $ex_exam_master = Exam::findOrFail($request->id)->update([
        'title'=>$request->title,
        'category'=>$request->category,
        'exam_date'=>$request->exam_date,
    ]);
    echo json_encode(array('status'=>'true','message'=>'updated success','reload'=>url('Admin.manage_exam')));
}

//************************************questions part */
public function add_question($id){
    $questions = ex_exam_question_master::where('exam_id','=',$id)->get(); 
return view('Admin.add_question' , compact('questions'));
}

public function addNewQuestion(Request $request){     
    $validator = Validator::make($request->all(),['question'=>'required','option1'=>'required','option2'=>'required','option3'=>'required','option4'=>'required','ans'=>'required']);
    if($validator->fails()){
        $arr3 = array('status'=>'false','message'=>$validator->errors()->all);
    }else{
        $manage_question = new  ex_exam_question_master();
        ex_exam_question_master::create([
            'exam_id'=>$request->exam_id,
            'question'=>$request->question,
            'ans'=>$request->ans,
            'option'=>json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,
                                        'option3'=>$request->option3,'option4'=>$request->option4)),
            'status'=>1
            ]);
            $arr3 = array('status'=>'true','message'=>'question successfully added','reload'=>url('Admin.add_question',$request->exam_id));
          
    }
    echo json_encode($arr3);
}
public function question_status($id){
    $ex_exam_question_master = ex_exam_question_master::where('id',$id)->get()->first();
    if($ex_exam_question_master->status==1){
        $status=0;
    }else{
        $status=1;
    }
    $ex_exam_master1 = ex_exam_question_master::where('id',$id)->get()->first();
    $ex_exam_master1->status=$status;
    $ex_exam_master1->update();
}

public function delete_question($id){
    $ex_exam_question_master = ex_exam_question_master::where('id','=',$id)->get()->first();
    $exam_id = $ex_exam_question_master->exam_id;
    $ex_exam_question_master->delete();
    return redirect(route('add_question', $exam_id));
}
public function edit_question($id){
    $ex_exam_question_master = ex_exam_question_master::where('id','=',$id)->get();
return view('Admin.edit_question',compact('ex_exam_question_master'));
}
public function updateQuestion(Request $request){
    // echo "<pre>";
    // print_r($request->all());
    $request->validate([
        'question'=>'required',
        'option1'=>'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
        'ans' => 'required',
    ]);
    $question = ex_exam_question_master::where('id','=',$request->id)->get()->first();

        $question->question=$request->question;
        $question->ans=$request->ans;
        $question->option=json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,
                                      'option3'=>$request->option3,'option4'=>$request->option4));
        $question->update();
return redirect(url('Admin.add_question',$question->exam_id));
}
//********************************************  Students ************************************************************//
public function students(){
    $ex_exam_master = ex_exam_master::where('status','1')->get();
    $ex_students = ex_students::select('ex_students.*','ex_exam_masters.title as ex_name','ex_exam_masters.exam_date')->
                                join('ex_exam_masters','ex_students.exam','=','ex_exam_masters.id')->
                                orderBy('id','desc')->get();
        return view('Admin.students',compact('ex_students'),compact('ex_exam_master'));
}
public function add_students(Request $request){
    $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','password'=>'required','mobile_no'=>'required','dob'=>'required','exam'=>'required']);
    if($validator->fails()){
        $arr4 = array('status'=>'false','message'=>$validator->errors()->all);
    }else{
        $ex_students = new  ex_students();
        ex_students::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'dob'=>$request->dob,
            'exam'=>$request->exam,
            'password'=>Hash::make($request->password),
            'status'=>1
            ]);
            $arr4 = array('status'=>'true','message'=>'student successfully added','reload'=>url('Admin.students'));
    }
    echo json_encode($arr4);
}
public function student_status($id){
    $ex_students = ex_students::where('id',$id)->get()->first();
    if($ex_students->status==1){
        $status=0;
    }else{
        $status=1;
    }
    $ex_students = ex_students::where('id',$id)->get()->first();
    $ex_students->status=$status;
    $ex_students->update();
}
public function delete_student($id){
    $ex_students = ex_students::findOrFail($id)->delete();
    return redirect(route('students'));
}
public function edit_student($id){
    $ex_exam_master = ex_exam_master::where('status','1')->get();
    $ex_students = ex_students::findOrFail($id);
    return view('Admin.edit_student',compact('ex_students'),compact('ex_exam_master'));
}
public function update_student(Request $request){
    $request->validate([
        'name'=>'required','email'=>'required','password'=>'required','mobile_no'=>'required','dob'=>'required','exam'=>'required'
    ]);
    
    $ex_students = ex_students::findOrFail($request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'dob'=>$request->dob,
            'exam'=>$request->exam,
            'password'=>$request->password,
            'status'=>1
    ]);
    echo json_encode(array('status'=>'true','message'=>'updated success','reload'=>url('Admin.students')));
}

//********************************************  manage_portal ************************************************************//

public function manage_portal(){
    $ex_portal = ex_portal::orderBy('id','desc')->get();
    return view('Admin.manage_portal',compact('ex_portal'));
}
public function add_portal(Request $request){
    $validator = Validator::make($request->all(),['name'=>'required','email'=>'required','password'=>'required','mobile_no'=>'required']);
    if($validator->fails()){
        $arr5 = array('status'=>'false','message'=>$validator->errors()->all);
    }else{
        $ex_portal = new  ex_portal();
        ex_portal::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'password'=>Hash::make($request->password),
            'status'=>1
            ]);
            $arr5 = array('status'=>'true','message'=>'Portal successfully added','reload'=>url('Admin.manage_portal'));
    }
    echo json_encode($arr5);
}
public function portal_status($id){
    $ex_portal = ex_portal::where('id',$id)->get()->first();
    if($ex_portal->status==1){
        $status=0;
    }else{
        $status=1;
    }
    $ex_portal = ex_portal::where('id',$id)->get()->first();
    $ex_portal->status=$status;
    $ex_portal->update();
}
public function delete_portal($id){
    $ex_portal = ex_portal::findOrFail($id)->delete();
    return redirect(route('manage_portal'));
}
public function edit_portal($id){
    $ex_portal = ex_portal::findOrFail($id);
    return view('Admin.edit_portal',compact('ex_portal'));
}
public function update_portal(Request $request){
    $request->validate([
        'name'=>'required','email'=>'required','password'=>'required','mobile_no'=>'required'
    ]);
    
    $ex_portal = ex_portal::findOrFail($request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->mobile_no,
            'password'=>Hash::make($request->password),
            'status'=>1
    ]);
    echo json_encode(array('status'=>'true','message'=>'updated success','reload'=>url('Admin.manage_portal')));
}
}
