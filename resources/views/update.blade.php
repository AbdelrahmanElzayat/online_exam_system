@extends('layouts.app')
@section('title')
  Update 
@endsection
@section('content')
    <div class="container">
        <h2 class="text-center py-5">welcome to add page</h2>

        <form method="POST" action="{{route('edit_sub',$a->title)}}">
            @method('put')
            @csrf
            <div class="mb-3">
                {{-- <input type="hidden" value="{{$a->id}}" name="id"> --}}
                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input type="text" class="form-control" name="title" placeholder="title" value="{{$a->title}}" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">body</label>
                <textarea class="form-control" rows="3" id="body" name="body">{{$a->body}}</textarea>
              </div>
          <div class="mb-3 row">
            <div class="col-sm-10">
                <button class="buuton" type="submit">submit</button>
            </div>
          </div>
        </form>
    </div>
@endsection