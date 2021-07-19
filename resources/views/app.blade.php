@extends('layouts.app')
@section('style')    
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
<style>
    .container{
        padding-top: 36.5rem!important
    }
</style>
@endsection
@section('content')
<div class="container">
<div id="app"></div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/app.js') }}"></script>  
@endsection
