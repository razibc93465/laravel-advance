<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ArticlesController extends Controller
{
    public function index()
    {
        // Returns all 500 with Caching
        return Cache::remember('articles', 60, function () {
            return Article::all();
        });
    }

    public function allWithoutCache()
    {
        // Returns all 500 without Caching
        return Article::all();
    }

    // public function index() {
    //     if ( Cache::has('articles_index') ) {
    //         return Cache::get('articles_index');
    //     } else {
    //         $news = News::all();
    //         $cachedData = view('articles.index')->with('articles', $news)->render();
    //         Cache::put('articles_index', $cachedData);
    //         return $cachedData;
    //     }
    // }
}
