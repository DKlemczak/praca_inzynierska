@extends('layouts.dashboard')

@section('content')
    <a class="nav-link" href="{{ route('dashboard.contact.index') }}">Dane kontaktowe</a>
    <a class="nav-link" href="{{ route('dashboard.news.index') }}">Aktualności</a>
@endsection