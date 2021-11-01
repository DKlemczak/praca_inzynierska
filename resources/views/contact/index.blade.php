@extends('layouts.app')

@section('content')
<div class="container">
    <label for="city" class="col-form-label">Miasto: </label>
        <p>{{$contact->city}}</p>
    <label for="postcode" class="col-form-label">Kod pocztowy: </label>
        <p>{!! $contact->postcode !!}"</p>
    <label for="post" class="col-form-label">Poczta: </label>
        <p>{!! $contact->post !!}</p>
    <label for="street" class="col-form-label">Ulica: </label>
        <p>{{$contact->street}}</p>
    <label for="building_number" class="col-form-label">Numer budynku: </label>
        <p>{{$contact->building_number}}</p>
    <label for="phone_number" class="col-form-label">Numer telefonu: </label>
        <p>{{$contact->phone_number}}</p>
    <label for="email" class="col-form-label">Email: </label>
        <p>{{$contact->email}}</p>
</div>
@endsection