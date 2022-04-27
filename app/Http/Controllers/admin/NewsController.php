<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use function response;

class NewsController extends Controller
{
    public function getAllNews()
    {
        $news = News::all();

        foreach ($news as $onenews){
            $onenews->image_url = asset('storage/' . $onenews->image_url);
        }

        return response()->json($news);
    }

    public function getOneNews(Request $request)
    {
        $newsId = $request->get('news_id');
        $news = News::whereId($newsId)->first();
        $news->image_url = asset('storage/' . $news->image_url);
        return response()->json($news);
    }

}
