@extends('layouts.app')
@section('title')
Aktualności
@endsection
@section('content')
<div class="container">
    <div class="row m-0 p-0 col-12 border">
    @foreach($news as $new)
        <h1>{!! $new->title !!}</h1>
        <a aria-label="Odnośnik przekierowujący do szczegółów wpisu {{$new->title}}" href="{{ route('news.details',[$new->id,$new->title]) }}">Szczegóły</a>
    @endforeach
    </div>
</div>
@endsection
