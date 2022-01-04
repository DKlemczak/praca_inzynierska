<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class UploadImageController extends Controller
{
    public function storeImageNews(Request $request)
    {
        if ($request->hasFile('file')) {
            $classifiedImg = $request->file('file');
            $filenameWithExt = $classifiedImg->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameToStore = str_replace(" ", "-", $filename) . '_' . time();

            $image = Image::make($classifiedImg)->encode('webp', 90)->save('images/news/description/' . $fileNameToStore . '.webp');

            return env('APP_URL') . '/images/news/description/' . $fileNameToStore . '.webp';
        }
    }
}
