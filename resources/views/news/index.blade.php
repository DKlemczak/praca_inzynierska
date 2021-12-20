@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-0 p-0 col-12 border">
    @foreach($news as $new)
        <p>{!! $new->title !!}</p>
        <a href="{{ route('news.details',[$new->id]) }}">Szczegóły</a>
    @endforeach
    </div>
</div>
@endsection
