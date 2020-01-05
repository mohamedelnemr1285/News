<?php

namespace App\Http\Controllers;

use App\like;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;

class Articlecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $articles = Article::all();
//        return view('layouts.index',compact('articles'));
//    }

public function search(Request $request){

//    $articles = Article::whereHas('User', function($q) use ($request) {
//         $q->where('news', 'LIKE', '%' . $request->search . '%');
//    })->paginate(1);

    $search = $request->input('search');
    $articles = Article::latest()
    ->Search($search);


    return view('layouts.display', compact('articles'));
}


    public function display()
    {
        $articles = Article::latest()->get();
        return view('layouts.display',compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){

        $stop_article = DB::table('settings')->where('name','stop_article')->value('value');
        return view('layouts.create',compact('stop_article'));

    }

    public function store(Request $request)
    {
        $messages = [
            'news.required' => 'Input Your news',
            'article.required' => 'Input Your article '
        ];
        $this->validate($request,[
            'news'=>'required',
            'article'=>'required'

        ],$messages);


      $img_name = time(). '.' .$request->image->getClientOriginalExtension();
        $request->image->move(public_path('storage'),$img_name);

        $article = new  Article;
        $article->news= $request->news;
        $article->article=$request->article;
        $article->image=$img_name;
        $article->user_id=auth()->user()->id;

        $article->save();


        return redirect(route('display'))->with('success', 'Done success');

        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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

        $article = Article::find($id);
        return view('layouts.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $article = Article::find($id);

        $img_name = time(). '.' .$request->image->getClientOriginalExtension();
        $article->news = request('news');
        $article->article = request('article');
        $article->image = $img_name;

        $article->save();


        $request->image->move(public_path('storage'),$img_name);

        $article->save();

        return redirect(route('display'));
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Article::where('id',$id)->delete();
        session()->flash('success','Done');
        return back();
    }


    public function statistics (){

        $likes = like::all()->count();
        $articles = DB::table('articles')->count();

        $most_likes = User::withCount('likes')
            ->orderby('likes_count','desc')->first();

        $check_article = DB::table('articles')->where('user_id',$most_likes->id)->count();

//        $most_articles = User::withcount('articles')
//            ->orederby('articles_count','desc')->first();

        $statistics = [
            'likes' => $likes   ,
          'articles' => $articles  ,
         'most_likes' =>  $most_likes  ,
        //  'most_articles' => $most_articles ,
          'check_article' => $check_article  ];

        return view('layouts.statistics',compact('statistics'));

    }


    public function like(Request $request){


        $like_s = $request->like_s;
        $article_id = $request->article_id;

        $like = DB::table('likes')->where('article_id',$article_id)
            ->where('user_id',Auth::user()->id)
            ->first();
        if(!$like){
            $new_like = new like;
                $new_like->article_id = $article_id;
                $new_like->user_id = Auth::user()->id;
               $new_like->like = 1;
            $new_like->save();
            $is_like = 1;

        }elseif ($like->like == 1){
            DB::table('likes')
                ->where('article_id',$article_id)
                ->where('user_id',Auth::user()->id)
                ->delete();
                 $is_like = 0;


        }elseif ($like->like == 0){
            DB::table('likes')
                ->where('article_id',$article_id)
                ->where('user_id',Auth::user()->id)
                ->update(['like' => 1]);
                 $is_like = 1;
        }

        $response=[

            'is_like' => $is_like,
        ];
        return response()->json($response , 200);
    }

}





