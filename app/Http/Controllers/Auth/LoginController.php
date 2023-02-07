<?php
 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function login(){
        return view('usuario.login');
    }

    public function authenticate(Request $request)
    {
        $validator = $this->validateLoginEmailForm($request);    

        /*Si sale algun error retornamos errores a la ruta inicial de login*/
        if($validator->fails()){
            
            return redirect()->route('/usuario/login')
                ->withErrors($validator)
                ->withInput();
        }        
        else{
            $credentials = $request->only('email', 'password');

            try {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('/usuario/profile');
                }
                else{   
                    $validator->errors()->add('error_input', 'Password no válida');
                    return back()
                        ->withErrors($validator)
                        ->withInput();                          
                }  
            } catch (Throwable $e) {
                dd($e);
         
                return false;
            }
          
        }

    }

    function validateLoginEmailForm(Request $request){
        $rules =array(
            'email' => 'required|exists:usuarios,email',
            'password' => 'required|min:6'
        );
        $messages = [
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe tener formato de correo',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'El campo password debe contener al menos 5 caracteres',
            'email.exists'    => 'No se encuentra registrado.'//<a href="'.asset('usuario/register').'">registrate Aquí</a>'
        ];
        return Validator::make($request->all(),$rules,$messages);
    }    
}