@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 100px">
        <p>File: {{ $file_name }}</p>
        <img src="{{ URL::to($file_path) }}" alt="" class="img-responsive">
    </div>
@endsection
