@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="text-center text-white rounded color">
            <h1 class="display-4">Strony Statyczne</h1>
        </div>
        <div class="row mt-2 border-bottom">
            <div class="col-1"></div>
            <div class="col-2">
                <span class="text-center h5">Tytuł</span>
            </div>
            <div class="col-7">
                <span class="text-center h5">Zawartość</span>
            </div>
            <div class="col-1"></div>
        </div>
        @foreach ($staticsites as $staticsite)
        <div class="row mt-2 border-bottom">
            <div class="col-1"></div>
            <div class="col-2">
                <span class="text-center">{!! $staticsite->name !!}</span>
            </div>
            <div class="col-8">
                <span class="text-center">{!! $staticsite->content !!}</span>
            </div>
            <div class="col-1">
                <a class="btn btn-secondary mb-2" href="{{ route('dashboard.staticsites.edit', $staticsite->id) }}">Edytuj</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection