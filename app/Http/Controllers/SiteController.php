<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaticSite;

class SiteController extends Controller
{
    public function index()
    {
        $staticsite = StaticSite::where('name','index')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
    public function ad()
    {
        $staticsite = StaticSite::where('name','ad')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
    public function tos()
    {
        $staticsite = StaticSite::where('name','tos')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
    public function about()
    {
        $staticsite = StaticSite::where('name','about')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
    public function contact()
    {
        $staticsite = StaticSite::where('name','contact')->first();
        return view('site.index',['StaticSite' => $staticsite]);
    }
}
