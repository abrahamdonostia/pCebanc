<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use App\Rules\MatchOldPassword;
use Image;


class UserController extends Controller
{
    public function loginForm(){
        return view('user/loginForm');
    }

    public function doLogin(Request $request){
        // Reglas de validación
        $rules = array(
          'email' => 'required|email', 
          'password' => 'required|alphaNum|min:6');
          
        $validator = Validator::make(Input::all() , $rules);
          // Si falla el validador redirige al formulario
        if ($validator->fails())
        {
            return redirect('/user/loginPage')->withErrors($validator) 
            ->withInput(Input::except('password')); //mantenemos los datos en eel form menos el pass para qu elo meta de nuevo
        }
        else
        {
            // crea usuario para autenticar
            $userdata = array(
              'email' => Input::get('email'),//$request->input('email'),
              'password' => Input::get('password')//$request->input('password'),
            );
            //ejecutamos el login
            if (Auth::attempt($userdata))
              {
               
                return redirect('/');
              }
              else
              {
                
              // validation not successful, send back to form
              //return redirect('/user/loginPage');
                $errors = new MessageBag(['password' => 'Email and/or password invalid.']); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

                return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
              }
            }
        }
    
    
    public function registerForm(){
        return view('register');
    }

    public function register(Request $request){
               
           
        //Validar datos
        $validate = Validator::make($request->all(), [ //validador de laravel usando el alias
            'name' => 'required|alpha|max:20',
            'surname' => 'required|alpha|max:20',
            'email' => 'required|email|unique:users', //Comprobar si el usuario existe
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {
            return redirect('user/register')->withErrors($validate)->withInput();
            
        
        
        }else{ //Validacion correcta

            //Cifrar contraseña
            $pwd = \Hash::make($request->password);
            
            //crear usuario
            $user = new User();
            $user->name = $request['name'];
            $user->surname = $request['surname'];
            $user->email = $request['email'];
            $user->password = $pwd;
            $user->image = 'avatar.jpg';
            $user->role = 'ROLE_USER';
            
            //guardar usuario

            $user->save();

            
            return redirect('user/registerSuccess');
        }
        
    }
/////////fin REGISTRAR USUARIO///////////////////

/////////EDITAR USUARIO///////////////////

    public function profile(Request $request){
        if(\Auth::check()){
            $user = Auth::user();

            return view('user/profile', [
                'name' => $user->name,
                'surname' => $user->surname,
                'email' => $user->email,
                'image' => $user->image,
            ]);    
        }
        else{
            return redirect('user/loginPage');
        }
    }

    public function updatePassword(Request $request){
        if(\Auth::check()){
            $user = Auth::user();
            //Validar datos
            $validate = Validator::make($request->all(), [ //validador de laravel usando el alias
                'current_password' => 'required|min:6',
                'current_password' => new MatchOldPassword, //Rule creada para confirmarlo
                'new_password' => 'required|min:6',
                'new_password_confirm' => 'same:new_password', //Comprobar que es el mismo
            ]);

            if ($validate->fails()) {
                return redirect('user/profile')->withErrors($validate)->withInput();
                
            
            
            }else{ //Validacion correcta

               if( User::find(auth()->user()->id)->update(['password'=> \Hash::make($request->new_password)])){
                $success = new MessageBag(['success' => 'Guardado con éxito.']);
                return Redirect::back()->with($success);
               }else{

                
                $errors = new MessageBag(['password' => 'Email and/or password invalid.']); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

                return Redirect::back()->withErrors($errors);
               }
            }
        }else{
            return redirect('user/loginPage');
        }
    }

    public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/users_avatars/'.$filename));
            $user = Auth::user();

            $user->avatar = $filename;

            $user->save();
        }
        return redirect('user/profile');
    }
    
    /////////fin   EDITAR USUARIO///////////////////
    /////////SUBIR ARTICULO///////////////////
   public function createArticle(){
       //$categories = Category::all();
       $categories = Category::whereNull('parentId')->get(); //select de las que son categorias raiz, mas adelante se actualizara con subcategorias
       return view('user/createArticle', ["categories"=> $categories]);
   }

    /////////fin   CREAR ARTICULO///////////////////
}
