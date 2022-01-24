@extends('layouts.app')
@section('title')
{{$StaticSite->name}}
@endsection
@section('content')
<div class="container">
    <div class="row m-0 p-0 col-12">
        <p tabindex="0">{!!$StaticSite->content!!}</p>
    </div>
</div>
@endsection
