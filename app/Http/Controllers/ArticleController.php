<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Category;
use Auth;
use DB;
use App\Quotation;
use Intervention\Image\ImageManagerStatic as Image;



class ArticleController extends Controller
{
    public function listLastArticles(){

        $articles = Article::all()->take(5);
        return view('welcome')->with('articles', $articles);

    }

    public function addArticle(Request $request){
        if(\Auth::check()){
            $user = Auth::user();
            //Validar datos
            $validate = Validator::make($request->all(), [ //validador de laravel usando el alias
                'title' => 'required|min:12',
                'description' => 'required|min:20', 
                'content' => 'required|min:40',
                'category' => 'required|in:1,2,3,4,5,6,7',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                
            ]);

            if ($validate->fails()) {
                return redirect('user/createArticle')->withErrors($validate)->withInput();
                
            
            
            }else{ //Validacion correcta
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save('img/article/' . $filename);

                $article = new Article();
                $article->user_id = Auth::user()->user_id;
                $article->title = $request['title'];
                $article->description = $request['description'];
                $article->text = $request['content'];
                $article->category_id = $request['category'];
                $article->image = ('img/article/' . $filename);

               if($article->save()){
                    $success = new MessageBag(['success' => 'Guardado con éxito.']);
                    return redirect('article/'.$article->id);
               }else{

                
                    $errors = new MessageBag(['password' => 'Se ha producido un error.']); // en caso de error de algún tipo se devuelve

                    return Redirect::back()->withErrors($errors);
               }
            }
        }else{
            return redirect('user/loginPage');
        }
    }

    public function showArticle($id){
        //$article = $request->get('article');
        $article = Article::find($id);
        $image = $article->image;
       return view('article')->with([
           'article' => $article,
           'image' => $image
           ]);
    }

    public function listCategory($category){
        $articles=DB::table('articles')->where('category_id', $category)->paginate(10);
        return view('categoryList', ['articles' => $articles]);
    }
}
