
    
  
                     <table class="table table-striped table-bordered table-hover datatable">
                         <thead>
                             <th>#</th>
                             <th>Exam Title</th>
                             <th>Exam Date</th>
                             @if (auth()->user()->user_role() === 'student')
                             <th>Status</th>
                             <th>Result</th>
                             <th>Action</th>
                             @endif
                         </thead>
                       <tbody> 
                         @foreach ($exams as $exam)
                         <tr>
                           <th>{{$exam->id}}</th>
                           <td>{{$exam->title}}</td>
                           <td>{{$exam->exam_date}}</td>
                           @if (auth()->user()->user_role() === 'student')
                           <td>
                             @if(strtotime($exam->exam_date)<strtotime(date('Y-m-d')))
                             {{"Finished"}}
                             @endif
                             @if(strtotime($exam->exam_date)==strtotime(date('Y-m-d')))
                             {{"running"}} 
                             @endif  
                             @if(strtotime($exam->exam_date)>strtotime(date('Y-m-d')))
                             {{"pending"}}
                             @endif
                           </td>
                           <td>
                             @if (isset($exam->get_user()->yes_ans)) 
                             {{$exam->get_user()->yes_ans}}/{{$exam->get_user()->yes_ans+$exam->get_user()->no_ans}}
                             @endif
                           </td>
                           <td>
                           @if(strtotime($exam->exam_date)==strtotime(date('Y-m-d')))
                             @if (isset($exam->get_user()->yes_ans))
                                 finish
                              @else
                              <a href="{{route('join_exam_form',$exam->id)}}" class="btn btn-info">Join Exam</a> 
                             @endif
                           @endif 
                         </td>
                         @endif
                         </tr>
                         @endforeach
                       </tbody>
                       <tfoot>
                           <th>#</th>
                           <th>Exam Title</th>
                           <th>Exam Date</th>
                           @if (auth()->user()->user_role() === 'student')
                           <th>Status</th>
                           <th>Result</th>
                           <th>Action</th>
                           @endif
                       </tfoot>
                     </table>
         

  </div>