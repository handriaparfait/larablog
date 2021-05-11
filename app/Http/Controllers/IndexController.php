<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Post;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::orderBy('created_at', 'desc')->All()->get();
        $tags = DB::table('tags')->get();
        $agriculteurs = DB::table('posts')->where('category_id', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $batisseurs = DB::table('posts')->where('category_id', 2)->orderBy('created_at', 'desc')->limit(3)->get();
        $chasseurs = DB::table('posts')->where('category_id', 3)->orderBy('created_at', 'desc')->limit(3)->get();
        $guerisseurs = DB::table('posts')->where('category_id', 4)->orderBy('created_at', 'desc')->limit(3)->get();
        $mineurs = DB::table('posts')->where('category_id', 5)->orderBy('created_at', 'desc')->limit(3)->get();
        $pecheurs = DB::table('posts')->where('category_id', 6)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('index')
            ->withAgriculteurs($agriculteurs)
            ->withBatisseurs($batisseurs)
            ->withChasseurs($chasseurs)
            ->withGuerisseurs($guerisseurs)
            ->withMineurs($mineurs)
            ->withPecheurs($pecheurs)
            ->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
