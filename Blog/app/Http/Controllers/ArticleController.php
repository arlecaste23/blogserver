<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
//use Auth;
class ArticleController extends Controller
{
	
	protected $cu = "no";
	protected $check;
	function __construct() {
		$this->cu = Auth::User();
		$this->check = Auth::check();
		
	}

    public function index()
    {	$articles = Article::all();
	$cc = count($articles);
	json_encode($articles);
        return response()->json($articles, 200);
    }
	public function index0(Article $article)
    {
	
	$user = Auth::User();
	if($user) {
		return view('updatepanel', ['article'=>$article]);
	} else return "Permission denied! You have to login first1!";

/*
	global $cu;
	if($this->cu) {
	*///	return view('updatepanel', ['article'=>$article]);
/*	} else return "Permission denied! You have to login first1! ".Auth::User();*/
	
	/*$all = $request->all();
	$id = $request->id;
	$current = Article::find($id);
	/*
	echo $current->title."<br>";
	echo $current->body."<br>";*/
	//return view('testview', ['article'=>$article]);
    }

	public function show0($id)
    {	
	return Article::find($id);
    }

	public function test($id)
    {	
	$result = Article::find($id);
	return view('testview', ['title'=>$result]);
    }
	public function update0($id) {
		echo "ok";
	}
	public function androidshow(Article $article) {
		/*$response = array();
		$response["id"] = $article->id;
		$response["title"] = $article->title;
		$response["body"] = $article->body;
		$response["created_at"] = $article->created_ad;
		$response["updated_at"] = $article->updated_at;

		$data = Response::json($response)->header('Content-Type', 'application/json');
echo $data->getContent();*/
		$articles = Article::all();
		return $articles;
	}
    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
	 public function deletepanel(Article $article)
    {
        
        return view('deletepanel', ['article'=>$article]);
    }
}

