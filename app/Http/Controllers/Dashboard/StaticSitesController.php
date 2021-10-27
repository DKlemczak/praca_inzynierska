<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\StaticSite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StaticSitesController extends Controller
{
    public function index()
    {
        $staticsites = StaticSite::paginate(15);
        return view('dashboard.staticsites.index', ['staticsites' => $staticsites]);
    }

    public function create()
    {
        return view('dashboard.staticsites.create');
    }

    public function edit($id)
    {
        $staticsites = StaticSite::where('id', $id)->first();
        return view('dashboard.staticsites.edit')->with(['staticsites' => $staticsites]);
    }

    public function store(Request $request)
    {
        $staticsites = new StaticSite;
        $staticsites->name = $request->name;
        $staticsites->content = $request->content;
        $staticsites->save();

        return redirect()->route('dashboard.staticsites.index');
    }

    public function update(Request $request, $id)
    {
        $staticsites = StaticSite::where('id', $id)->first();
        $staticsites->name = $request->name;
        $staticsites->content = $request->content;
        $staticsites->save();

        return redirect()->route('dashboard.staticsites.index');
    }

    public function destroy($id)
    {
        $staticsites = StaticSite::find($id);
        $staticsites->delete();
        return redirect()->route('dashboard.staticsites.index');
    }
}
