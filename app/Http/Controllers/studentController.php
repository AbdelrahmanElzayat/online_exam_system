<?php

namespace App\Http\Controllers;

use App\course;
use Illuminate\Http\Request;
use App\ex_students;
use App\ex_exam_question_master;
use App\model\ex_result;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Stroage;
use App\file;


class studentController extends Controller
{
    public function Exams(){
       $exams = auth()->user()->exams;
       return view('Student.Exams',[
           'exams'=>$exams
       ]);

    }
    public function join_exam_form($id){
        if(session()->get('studentSession')){
            $data = ex_exam_question_master::where('exam_id','=',$id)->get();
            return view('Student.join_exam_form',compact('data'));
        }else{
            return view('Student.loginStudent');
        }
        
    }
    public function submit_exam(Request $request){
        
        $yes_ans = 0;
        $no_ans = 0;
        $data = $request->all();
        $result = array();
        for($i=1;$i<=$request->index;$i++){
            if(isset($data['question'.$i])){
                $question =ex_exam_question_master::where('id','=',$data['question'.$i])->get()->first();
                if($question->ans == $data['ans'.$i]){
                    $result[$data['question'.$i]]='yes';
                    $yes_ans++;
                }else{
                    $result[$data['question'.$i]]='no';
                    $no_ans++;
                }
            }
        }
        $all_std = ex_students::select('ex_students.*','ex_exam_masters.title as ex_name','ex_exam_masters.exam_date')->
        where('exam','=',$request->exam_id)->
        join('ex_exam_masters','ex_students.exam','=','ex_exam_masters.id')->get()->first(); 

        $std_info = ex_students::select('ex_students.*','ex_exam_masters.title as ex_name','ex_exam_masters.exam_date')->
        join('ex_exam_masters','ex_students.exam','=','ex_exam_masters.id')->where('ex_students.id','=', session('studentSession'))->get()->first();

        $res = new ex_result();
        $res->exam_id = $request->exam_id;
        $res->user_id = $std_info->id;
        $res->yes_ans = $yes_ans;
        $res->no_ans = $no_ans;
        $res->result_json = json_encode($result);
        $res->save();
        return redirect(route('show_result',$res->id));
     
    }
    public function show_result($id){

        $result_info = ex_result::where('id','=',$id)->get()->first();

        $all_std = ex_students::select('ex_students.*','ex_exam_masters.title as ex_name','ex_exam_masters.exam_date')->
        join('ex_exam_masters','ex_students.exam','=','ex_exam_masters.id')->where('exam','=',$result_info->exam_id)->get()->first();   

        $std_info = ex_students::select('ex_students.*','ex_exam_masters.title as ex_name','ex_exam_masters.exam_date')->
        join('ex_exam_masters','ex_students.exam','=','ex_exam_masters.id')->where('ex_students.id','=', session('studentSession'))->get()->first();

        return view('Student.show_result',compact('all_std','result_info'),compact('std_info'));
    }

/**************************************************** files page */

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



