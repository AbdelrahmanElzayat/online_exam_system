<?php

namespace App\Http\Controllers;

use App\course;
use Illuminate\Http\Request;
use App\ex_students;
use App\ex_exam_question_master;
use App\Exam;
use App\model\ex_result;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Stroage;
use App\file;
use App\question;
use App\Result;

class studentController extends Controller
{
//########################################### exams ##################################################

//***************************** view exams
    public function Exams(){
       $exams = auth()->user()->exams;
       return view('Student.Exams',[
           'exams'=>$exams
       ]);
    }

//**************************** questions form
    public function join_exam_form(Exam $id){
            $data = $id->questions;
            return view('Student.join_exam_form',compact('data'));
    }

//*************************** submit answers
    public function submit_exam(Request $request){
        $yes_ans = 0;
        $no_ans = 0;
        $data = $request->all();
        $result = array();
        for($i=1;$i<=$request->index;$i++){
            if(isset($data['question'.$i])){
                $question =question::where('id','=',$data['question'.$i])->get()->first();
                if($question->ans == $data['ans'.$i]){
                    $result[$data['question'.$i]]='yes';
                    $yes_ans++;
                }else{
                    $result[$data['question'.$i]]='no';
                    $no_ans++;
                }
            }
        }
        $res = new Result();
        $res->user_id = auth()->user()->id;
        $res->yes_ans = $yes_ans;
        $res->no_ans = $no_ans;
        $res->result_json = json_encode($result);
        $res->save();
        $exam = Exam::findOrFail($request->exam_id);
        $exam->assignResult($res);
        return redirect(route('show_result',$res->id));
    }

//**************************************************** result page
    public function show_result($id){

        $result_info = Result::where('id','=',$id)->get()->first();
        return view('Student.show_result',[
            'std_info'=>auth()->user(),
            'result_info'=>$result_info
        ]);
    }

//#################################################### upload files #########################################//

public function show_uploadPage(){
    return view('Student.uploadPage');
}
public function uploadAction(Request $request){
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'file'=>'required'
    ]);
    $data = new file();
    $file = $request->file;
    $filename = time();
    $extension =$file->getClientOriginalExtension();
    $data->file=$filename;
    $filename=$filename.'.'.$extension;

    $request->file->move(public_path('assets'),$filename);

    $data->name = $request->name;
    $data->extension = $extension;
    $data->description = $request->description;

    $data->save();
    $course = course::findOrFail($request->course_id);
    $course->assignfiles($data);
    return back();

}

//#################################################### files #########################################//
public function show_files(){
    $data = file::all();
    return view('Student.files',compact('data'));
}

public function download(file $abdo){

return response()->download(public_path('assets/'.$abdo->file.'.'.$abdo->extension));

}
public function view($id){
    $data = file::find($id);
    
    return view('/Student.files',compact('data'));
}

}



