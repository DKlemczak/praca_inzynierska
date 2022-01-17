@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-0 p-0 col-12">
        <video id="wideo" muted controls>
            <source src="wideo/test.mp4" type="video/mp4" />
        </video>
        <button data-toggle="tooltip" title="Przycisk od włączania i wyłączania wideo" OnClick="GrajPauza()" id="descr">Włącz wideo</button>
        <button OnClick="Wycisz()" id="wycisz">Wycisz</button>
        <div class="tooltip bs-tooltip-top" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
                Przycisk od włączania i wyłączania wideo
            </div>
          </div>
    </div>
</div>
<script>
    var wideo = document.getElementById('wideo');
    function GrajPauza()
    {
        var grajpauzaprzycisk = document.getElementById('graj-pauza');
        if(wideo.paused)
        {
            wideo.play();
            grajpauzaprzycisk.innerHTML = "Spauzuj wideo";
        }
        else
        {
            wideo.pause();
            grajpauzaprzycisk.innerHTML = "Włącz wideo";
        }
    }
    function Wycisz()
    {
        var wyciszprzycisk = document.getElementById('wycisz');
        if(wideo.muted)
        {
            wideo.muted = false;
            wyciszprzycisk.innerHTML = "Wycisz";
        }
        else
        {
            wideo.muted = true;
            wyciszprzycisk.innerHTML = "Odcisz";
        }
    }
</script>
@endsection
