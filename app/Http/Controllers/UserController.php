<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function loginForm(){
        return view('user/loginForm');
    }

    public function doLogin(){
        // Reglas de validación
        $rules = array(
          'email' => 'required|email', 
          'password' => 'required|alphaNum|min:6');
          
        $validator = Validator::make(Input::all() , $rules);
          // Si falla el validador redirige al formulario
        if ($validator->fails())
        {
            return redirect('login')->withErrors($validator) 
            ->withInput(Input::except('password')); //mantenemos los datos en eel form menos el pass para qu elo meta de nuevo
        }
        else
        {
            // crea usuario para autenticar
            $userdata = array(
              'email' => Input::get('email') ,
              'password' => \Hash::make(Input::get('password'))
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
                $errors = new MessageBag(['password' => ['Email and/or password invalid.'],
                                            'pass' => $userdata]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

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
                $user->role = 'ROLE_USER';
                
                //guardar usuario

                $user->save();

                
                return redirect('user/registerSuccess');
            }
        
        
    //return response()->json($data, $data['code']);
    //return redirect()->route('user/register')->with('data', $data);
    }
/////////fin REGISTRAR USUARIO///////////////////
    
    
    
}
