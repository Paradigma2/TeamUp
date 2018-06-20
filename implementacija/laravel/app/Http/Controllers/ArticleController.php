<?php
/* autor: Sanja Perisic, 97/2015 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Symfony\Component\HttpKernel\Exception\HttpException;
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
        if(Auth::user()->isAdmin==0){
             throw new HttpException(404);
        }
        $id =  $request->input('id');
        Article::where('id', $id)->delete();
        return redirect()->action('LobbyController@home');
    }

    /**
     * Funkcija za brisanje clanaka od strane autora
     *
     * @param Request $request
     *
     * @return Response
     */
    public function deleteArticle(Request $request){
        if(Auth::user()->isMod==0){
             throw new HttpException(404);
        }
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
        if(Auth::user()->isMod==0){
             throw new HttpException(404);
        }
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
 if(Auth::user()->isMod==0){
             throw new HttpException(404);
        }
         $article = Article::where('id', $request->input('articleId'))->first();
        $now = time(); // or your date as well
        $your_date = strtotime($article->created_at);
        $datediff = $now - $your_date;

        $days =  $datediff / (60 * 60 * 24);
        
         if($days>1){
            $greska = "Ne mozete da menjate clanak objavljen pre vise od dana.";
            return view('editArticle')->with('type', 'edit')->with('article', $article)->with('greska', $greska);
         }
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
        if(Auth::user()->isMod==0){
             throw new HttpException(404);
        }
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
        if(Auth::user()->isMod==0){
             throw new HttpException(404);
        }
        

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
        if(Auth::user()->isMod==0){
             throw new HttpException(404);
        }
        $id = Auth::user()->id;
       // $id=23;
        $articles = Article::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
        $length = count($articles);
        $user = User::where('id', $id)->first();
        return view('articles')->with('articles', $articles)->with('length', $length)->with('user', $user);
    }
    	
}