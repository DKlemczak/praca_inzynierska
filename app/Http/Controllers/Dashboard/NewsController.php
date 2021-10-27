<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(15);
        return view('dashboard.news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('dashboard.news.create');
    }

    public function edit($id)
    {
        $news = News::where('id', $id)->first();
        return view('dashboard.news.edit')->with(['news' => $news]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->user_id = $user->id;
        $news->save();

        return redirect()->route('dashboard.news.index');
    }

    public function update(Request $request, $id)
    {
        $news = News::where('id', $id)->first();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();

        return redirect()->route('dashboard.news.index');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('dashboard.news.index');
    }
}
