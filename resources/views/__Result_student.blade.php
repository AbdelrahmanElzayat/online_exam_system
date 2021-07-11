<table class="table table-striped table-bordered table-hover datatable">
    <thead>
        <th>#</th>
        <th>Student</th>
        <th>Exam Name</th>
        <th>Result</th>
    </thead>
    <tbody>
      @foreach ($exams as $exam)
      @foreach ($exam->results as $result)
      <tr>
        <th>{{$key++}}</th>
      <td>
       {{$result->get_user_email($result->user_id)}}
      </td>
      <td>{{$exam->title}}</td>
      <td>
        @if (isset($result->yes_ans)) 
        {{$result->yes_ans}}/{{$result->yes_ans+$result->no_ans}}
        @endif
      </td>
    </tr>
      @endforeach
      @endforeach
    </tbody>
    <tfoot>
        <th>#</th>
        <th>Student</th>
        <th>Exam Name</th>
        <th>Result</th>
    </tfoot>
</table>
</div>
