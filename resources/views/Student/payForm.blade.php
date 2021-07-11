@extends('layouts.app')
@section('title')
  Exam
@endsection
@section('content')
<div class="container">
    <form action="{{route('polpol')}}" method="POST">
        @csrf

       
{{-- ***************** --}}

<div class="d-flex justify-content-center my-5">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-center">Pay with Paypal</div>

                <div class="card-body">
                    {{-- ass a class --}}
                    <h5 class="">{{ Auth::user()->name}}<br></h5>
                    <h5 class=""> Have To Pay 576 EG This Year !</h5><br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">pay here</button>
                    </div>

            </div>
        </div>
    </form>
    </div>
</div>
@endsection