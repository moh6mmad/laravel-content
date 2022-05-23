<?php

namespace Moh6mmad\LaravelContent\App\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Moh6mmad\LaravelContent\App\Models\Content;

class ContentController extends Controller
{
    /**
    * Display a listing of the blog pages.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($category = '', $tag = '', Request $request)
    {
        $contents = Content::where('content_group', config('content.entity'))->where('status', '1');
        if (!empty($tag)) {
            $contents = $contents->where('tags', 'like', '%'.$tag.'%');
        }
        if (!empty($category)) {
            $contents = $contents->where('category', 'like', '%'.$category.'%');
        }
        
        $contents = $contents->orderBy('id', 'desc')->paginate(9);
        return view('laravel-content::index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function terms()
    {
        $page = Content::where('slug', 'terms')->firstOrFail();
        return view('pages.index', $page);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page_slug)
    {
        $page = Content::where('slug', $page_slug)->firstOrFail();
        return view('pages.index', $page);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blog($page_slug)
    {
        $page = Content::where('slug', $page_slug)->firstOrFail();
        $page->content = preg_replace('/(?<!\S)#([0-9a-zA-Z]+)/', '<a href="/blog/tag/$1">#$1</a>', $page->content);
        $word = str_word_count(strip_tags($page->content));
        $m = floor($word / 200) + 1;
        $page->estimate_reading = $m . ' minute' . ($m == 1 ? '' : 's');

        $page->related_contents = Content::inRandomOrder()->limit(2)->get();

        return view('blog.show', $page);
    }


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function HelpItemWithCategory($category = '', $page_slug = '')
    {
        $page = Content::where('slug', $page_slug)->firstOrFail();
        return view('help.show', $page);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function HelpItem($page_slug = '')
    {
        $page = Content::where('slug', $page_slug)->firstOrFail();
        return view('help.show', $page);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function HelpIndex()
    {
        $helps = Content::where('content_group', 'help')->where('status', '1')->orderBy('category', 'asc')->get();
        return view('help.index', compact('helps'));
    }

    /**
     * Display a dynamic page content
     * 
     * @param string $urlkey
     * 
     * @return view
     */
    public function dynamic($urlkey = ''){
      
        $page = Content::where('slug', $urlkey)->firstOrFail();
        return view('pages.index', $page);
    }

    
}
