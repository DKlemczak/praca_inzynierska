@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="text-center rounded color">
           <h1 class="display-4">Panel kontaktu</h1>
        </div>

        <form enctype="multipart/form-data" action="{{ route('dashboard.contact.update', $contact->id) }}" method="post" accept-charset="utf-8">
            @csrf
            @method('PATCH')
            <div class="container" style="width:50%;">
                <div class="row no-gutters mb-2">
                    <label for="city" class="col-form-label">Miasto: </label>
                    <div class="color ml-auto">
                        <input id="city" type="text" class="form-control" name="city" value="{{$contact->city}}" required>
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters mb-2">
                    <label for="postcode" class="col-form-label">Kod pocztowy: </label>
                    <div class="color ml-auto">
                        <input id="postcode" type="text" class="form-control" name="postcode" value="{!! $contact->postcode !!}" required>
                        @if ($errors->has('postcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('postcode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters mb-2">
                    <label for="post" class="col-form-label">Poczta: </label>
                    <div class="color ml-auto">
                        <input id="post" type="text" class="form-control" name="post" value="{!! $contact->post !!}" required>
                        @if ($errors->has('post'))
                            <span class="help-block">
                                <strong>{{ $errors->first('post') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters mb-2">
                    <label for="street" class="col-form-label">Ulica: </label>
                    <div class="color ml-auto">
                        <input id="street" type="text" class="form-control" name="street" value="{{$contact->street}}" required>
                        @if ($errors->has('street'))
                            <span class="help-block">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters mb-2">
                    <label for="building_number" class="col-form-label">Numer budynku: </label>
                    <div class="color ml-auto">
                        <input id="building_number" type="number" class="form-control" name="building_number" value="{{$contact->building_number}}" required>
                        @if ($errors->has('building_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('building_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters mb-2">
                    <label for="phone_number" class="col-form-label">Numer telefonu: </label>
                    <div class="color ml-auto">
                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{$contact->phone_number}}" required>
                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row no-gutters mb-2 shadow-b">
                    <label for="email" class="col-form-label">Email: </label>
                    <div class="color ml-auto">
                        <input id="email" type="text" class="form-control" name="email" value="{{$contact->email}}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
