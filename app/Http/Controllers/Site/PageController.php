<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if (!empty($page->id)) {
            return view('site.pages.page', compact('page'));
        } else {
            return view('404');
        }
    }
}
