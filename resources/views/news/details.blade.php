@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-0 p-0 col-12 border">
        <h1>{{$news->title}}</h1>
        <span>{{$news->content}}</span>
    </div>
</div>
@endsection
