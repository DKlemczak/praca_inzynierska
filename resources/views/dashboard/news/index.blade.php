@extends('layouts.dashboard')

@section('content')
    <div class="container">
            <div class="text-center rounded color">
            <h1 class="display-4">Aktualności</h1>
            <a class="btn btn-lg btn-secondary mb-1" href="{{ route('dashboard.news.create') }}">Dodaj</a>
            </div>
            <div class="row mt-2 border-bottom">
                <div class="col-3">
                    <span class="text-center h5">Tytuł</span>
                </div>
                <div class="col-6">
                    <span class="text-center h5">Zawartość</span>
                </div>
                <div class="col-1">
                    <span class="text-center h5">Użytkownik</span>
                </div>
                <div class="col-2"></div>
            </div>
        @foreach ($news as $new)
            <div class="row mt-2 border-bottom">
                <div class="col-3">
                    <span style="overflow: hidden; word-break: break-all; -webkit-line-clamp: 1; display: -webkit-box; -webkit-box-orient: vertical;">{!! $new->title !!}</span>
                </div>
                <div class="col-6">
                    <span style="overflow: hidden; word-break: break-all; -webkit-line-clamp: 1; display: -webkit-box; -webkit-box-orient: vertical;">{{ $new->content }}</span>
                </div>
                <div class="col-1">
                    <span class="text-center">{!! $new->user->name !!}</span>
                </div>
                <div class="col-1">
                    <a class="btn btn-secondary mb-2" href="{{ route('dashboard.news.edit', $new->id) }}">Edytuj</a>
                </div>
                <div class="col-1">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.news.destroy',[$new->id]) }}" accept-charset="UTF-8">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Usuń</button></a>
                    </form>
                </div>
            </div>
        @endforeach
        {{ $news->links() }}
    </div>
@endsection
