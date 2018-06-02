<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class ArticleController extends Controller
{
    public function makeArticle(Request $request){
        $this->validate($request,[
            'naslov' => 'required',
            'tekst' => 'required',
        ]);

    	$article = new Article();
    	$article->headline = $request->input('naslov');
    	$article->content = $request->input('tekst');
    	$article->user_id = 23; //sredi ovo!!!
	    $article->save();
	    $articles = Article::orderBy('updated_at', 'desc')->get();//i ovo, treba samo clanci usera da se dohvate
        $length = count($articles);
    	return view('articles')->with('articles', $articles)->with('length', $length);
    }
    	
}