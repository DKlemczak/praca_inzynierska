@extends('layouts.app')

@section('content')
<div class="container">
    <h1 tabindex="0"> Dane kontaktowe strony Widzialni w Internecie </h1>
    <label tabindex="0" for="street" class="col-form-label pb-0">Adres: </label>
        <p tabindex="0">{{$contact->city}}, {{$contact->street}} {{$contact->building_number}}</p>
    <label tabindex="0" for="post" class="col-form-label pb-0">Poczta: </label>
        <p tabindex="0">{!! $contact->post !!}, {!! $contact->postcode !!}</p>
    <label tabindex="0" for="phone_number" class="col-form-label pb-0">Numer telefonu: </label>
        <p tabindex="0">{{$contact->phone_number}}</p>
    <label tabindex="0" for="email" class="col-form-label pb-0">Email: </label>
        <p tabindex="0">{{$contact->email}}</p>
</div>
@endsection