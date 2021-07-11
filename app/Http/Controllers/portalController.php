<?php
namespace App\Http\Controllers;



use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\ex_portal;
use App\ex_exam_master;
use App\ex_students;
use App\Exam;
use Illuminate\Support\Facades\Hash;
use session;

class portalController extends Controller
{
    
         // ********************************************** DASHBOARD
        public function dashboardPortal(){
                // $ex_exam_master = ex_exam_master::select(['ex_exam_masters.*','ex_categories.name as cat_name'])->
                //                  join('ex_categories','ex_exam_masters.category','=','ex_categories.id')->where('ex_exam_masters.status','=','1')->
                //                 orderBy('id','desc')->get();
                                $ex_exam_master = Exam::all();
            return view('Portal.dashboardPortal',compact('ex_exam_master'));
            }
         


          // ********************************************** EXAM FORM
         public function exam_form($id){
         
                $ex_exam_master = ex_exam_master::where('id','=',$id)->get()->first();
                return view('Portal.exam_form',compact('ex_exam_master'));
                
         }
         public function examForm_save(Request $request){
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'mobile_no' => 'required',
                'password' => 'required',
                'dob' => 'required',
            ]);
            $std =new ex_students();
            $std->name=$request->name;
            $std->email=$request->email;
            $std->mobile_no=$request->mobile_no;
            $std->dob=$request->dob;
            $std->exam=$request->id;
            $std->password=Hash::make($request->password);
            $std->save();
            return redirect(url('Portal.print',$std->id));
         }
         public function printPortal($id){
     
                $std = ex_students::where('id','=',$id)->get()->first();
                $exam = ex_exam_master::where('id','=',$std->exam)->get()->first();
                return view('Portal.print',compact('std'),compact('exam'));
              
         }

          // ********************************************** STUDENT UPDATE
         public function searchStudent(){
         
                $exams = ex_exam_master::where('status','=','1')->get();
                return view('Portal.searchStudent',compact('exams')); 
                
         }
         public function updateStudent(Request $request){
            $request->validate([
                'mobile_no' => 'required',
                'dob' => 'required',
                'exam'=>'required'
            ]);
            $exam = ex_exam_master::where('id','=',$request->exam)->get()->first();
            $data['std'] = ex_students::where('mobile_no','=',$request->mobile_no)->where('dob','=',$request->dob)->where('exam','=',$request->exam)->get()->toArray();
            return view('Portal.updateStudent',compact('exam'),$data);
         }
         public function stdInfo_Update(Request $request){
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'mobile_no' => 'required',
                'password' => 'required',
                'dob' => 'required',
            ]);
            $students = ex_students::where('id','=',$request->id)->get()->first()->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile_no'=>$request->mobile_no,
                'dob'=>$request->dob,
                'password'=>Hash::make($request->password),
                
        ]);
        return redirect(url('Portal.print',$request->id));
         }
        }
    


