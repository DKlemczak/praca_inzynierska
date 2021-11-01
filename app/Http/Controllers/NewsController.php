<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() 
    {
        $news = News::get();
        return view('news.index',['news' => $news]);
    }

    public function details($id) 
    {
        $news = News::where('id', $id)->first();
        return view('news.details',['news' => $news]);

    }
}
