@extends('layouts.app')
@section('title')
Wybór koloru
@endsection
@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-6 text-center">
        <form action="javascript:SetColors()">
            <label for="kolor-tekstu">Kolor tekstu</label>
            <input id="kolor-tekstu" type="color" class="form-control" name="kolor-tekstu" value="{{$TextColor}}" /> 
            <br>
            <label for="kolor-tła"> Kolor tła</label>
            <input id="kolor-tła" type="color" class="form-control" name="kolor-tła" value="{{$BackgroundColor}}" />
            <button type="submit" class="button">Ustaw kolor</button>
        </form>
    </div>
</div>
<script>
    function SetColors()
    {
        var TextColor = document.getElementById('kolor-tekstu').value;
        var BackgroundColor = document.getElementById('kolor-tła').value;

        setCookie('TextColor', TextColor);
        setCookie('BackgroundColor', BackgroundColor);
    }
</script>
@endsection