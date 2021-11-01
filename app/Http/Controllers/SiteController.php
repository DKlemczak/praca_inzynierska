<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaticSite;

class SiteController extends Controller
{
    public function index()
    {
        $staticsite = StaticSite::where('name','Strona główna')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
    public function ad()
    {
        $staticsite = StaticSite::where('name','Deklaracja dostępności')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
    public function tos()
    {
        $staticsite = StaticSite::where('name','Regulamin')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
    public function about()
    {
        $staticsite = StaticSite::where('name','O nas')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
}
