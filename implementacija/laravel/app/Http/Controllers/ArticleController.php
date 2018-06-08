<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;

/**
 * ArticleController - klasa za dohvatanje, brisanje, kreiranje i editovanje clanaka.
 *
 * @version 1.0
 */
class ArticleController extends Controller
{

    /**
     * Funkcija za brisanje clanaka od strane administratora
     *
     * @param Request $request
     *
     * @return Response
     */
    public function deleteArticleAdmin(Request $request){
        $id =  $request->input('id');
        Article::where('id', $id)->delete();
        return redirect()->action('UserController@home');
    }

    /**
     * Funkcija za brisanje clanaka od strane autora
     *
     * @param Request $request
     *
     * @return Response
     */
    public function deleteArticle(Request $request){
        $id =  $request->input('id');
        Article::where('id', $id)->delete();
        return redirect()->action('ArticleController@showArticles');
    }

    /**
     * Funkcija za prikaz forme za kreiranje clanaka
     *
     * @param Request $request
     *
     * @return Response
     */
    public function createArticle(Request $request){
        return view('editArticle')->with('type', 'create');
    }

    /**
     * Funkcija za editovanje clanaka od strane autora
     *
     * @param Request $request
     *
     * @return Response
     */
    public function updateArticle(Request $request){
         $this->validate($request,[
            'naslov' => 'required',
            'tekst' => 'required',
        ]);

         $article = Article::where('id', $request->input('articleId'))->first();
         $article->headline = $request->input('naslov');
        $article->content = $request->input('tekst');
        $article->update(); //srediti da nije dozvoljeno ako je clanak objavljen pre vise od dana
        return redirect()->action('ArticleController@showArticles');
    }

    /**
     * Funkcija za prikaz clanka koji je izabran za editovanje
     *
     * @param Request $request
     *
     * @return Response
     */
    public function editArticle(Request $request){
        
        $article = Article::where('id', $request->input('id'))->first();
        //provera da li postoji clanak
        if($article == null){
            return redirect()->action('ArticleController@showArticles');
        }
        //proveru da li auth istovremeno i autor
        if($article->user_id != Auth::user()->id){
            return redirect()->action('ArticleController@showArticles');
        }
      
        
        return view('editArticle')->with('type', 'edit')->with('article', $article);
    }

    /**
     * Funkcija za kreiranje clanaka
     *
     * @param Request $request
     *
     * @return Response
     */
    public function makeArticle(Request $request){
        $this->validate($request,[
            'naslov' => 'required',
            'tekst' => 'required',
        ]);

    	$article = new Article();
    	$article->headline = $request->input('naslov');
    	$article->content = $request->input('tekst');
         $id = Auth::user()->id;
        // $id=23;
    	$article->user_id = $id; 
	    $article->save();

	    $articles =Article::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
        $length = count($articles);
    	 return redirect()->action('ArticleController@showArticles');
    }

    /**
     * Funkcija za prikaz clanaka na moderatorskoj stranici clanci
     *
     * @param Request $request
     *
     * @return Response
     */
    public function showArticles(){
        $id = Auth::user()->id;
       // $id=23;
        $articles = Article::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
        $length = count($articles);
        $user = User::where('id', $id)->first();
        return view('articles')->with('articles', $articles)->with('length', $length)->with('user', $user);
    }
    	
}