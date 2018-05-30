<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class ArticleController extends Controller
{
    public function makeArticle(Request $request){
    	$article = new Article();
    	//$article->ArticleID = 5;
    	$article->Headline = $request->input('naslov');
    	$article->Content = $request->input('tekst');
    	$article->UserID = 1; //sredi ovo!!!
	    $article->save();
	    $articles = Article::all();//i ovo, treba samo clanci usera da se dohvate
    	return view('articles')->with('articles', $articles);
    }
    	
}