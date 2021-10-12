@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-0 p-0 col-12 shadow">
        <p>{!!$StaticSite->content!!}</p>
    </div>

</div>
@endsection
