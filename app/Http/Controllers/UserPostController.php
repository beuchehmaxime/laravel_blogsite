<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    private $categories, $footerpost, $latestpost;
    public function __construct(){
        $this->categories = Category::select("id","name")
        ->orderBy('id','desc')
        ->offset(0)->limit(4)->get();

        $this->footerpost = Post::latest('id')->offset(0)->limit(3)->paginate();
        $this->latestpost = Post::latest('id')->offset(0)->limit(7)->paginate();
    }
    public function index(){
        $posts = Post::latest('id')->paginate();
        $popular_posts = POST::where('popular_post', '=', '1')->get();        
        $categories = $this->categories;
        $footerpost = $this->footerpost;
        $latestposts = $this->latestpost;
        return view('index', compact('posts','categories','popular_posts','footerpost', 'latestposts'));
    }
    
    public function category($id){
        $categoryposts = Category::find($id)->post()->get();
        $category = Category::find($id);
        $categories = $this->categories;
        $footerpost = $this->footerpost;
        $latestposts = $this->latestpost;
        return view('category',compact('categoryposts','category','categories','footerpost', 'latestposts'));
    }


    public function viewPost($id){
        $posts = Post::findOrFail($id);    
        $comments = Post::find($id)->comment()->latest('id')->get();    
        $commentcounts = Post::find($id)->comment()->count();    
        $categories =$this->categories;
        $footerpost = $this->footerpost;
        $latestposts = $this->latestpost;
        return view('post',compact('posts','categories','footerpost', 'latestposts', 'comments','commentcounts'));
    }

    public function contact(){        
        $categories =$this->categories;
        $footerpost = $this->footerpost;
        $latestposts = $this->latestpost;
        return view('contact',compact('categories','footerpost', 'latestposts'));
    }
    public function about(){        
        $categories =$this->categories;
        $footerpost = $this->footerpost;
        $latestposts = $this->latestpost;
        return view('about',compact('categories','footerpost', 'latestposts'));
    }
}
