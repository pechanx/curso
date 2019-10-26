<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/administracion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // VALIDAR CON CEDULA
    public function username()
    {
    $login = request()->input('email');
    $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'cedula';
    request()->merge([$field => $login]);
    return $field;
    }

    // PARA VALIDAR CON CORREO
    public function login(Request $request) {

        $this->validate($request, [
            'email' => [ 'required' ],
            'password'       => [ 'required' ],
        ]);

        $data = $request;
        $email = $data['email'];
        $password = $data['password'];
        $usuario = User::where('email',$email)->get();
        if($usuario->count()) // si al menos hay 1 usuario con ese correo en la BD
        {

             foreach($usuario as $item){
                        if($item->estado==0){           // es un usuario registrado pero esta dado de baja

                            // If the class is using the ThrottlesLogins trait, we can automatically throttle
                            // the login attempts for this application. We'll key this by the username and
                            // the IP address of the client making these requests into this application.
                            if ($this->hasTooManyLoginAttempts($request)) {
                                $this->fireLockoutEvent($request);

                                return $this->sendLockoutResponse($request);
                            }



                                $this->incrementLoginAttempts($request); // Si el usuario intenta muchas veces logearse este metodo le pondra un limite de logeo

                                return Redirect::back()->with('mensaje-error', 'Este usuario fue dado de baja en el sistema, comuniquese con sistemas');
                        }else{
                            if (Auth::attempt(['email' => $email, 'password' => $password]))
                                {


                                        return Redirect::to('administracion');



                                }else{
                                    return Redirect::back()->with('mensaje-error', 'El email o el password están incorrectos, vuelve a intentarlo.');

                                }


                    }
                }

        }else{



            // If the class is using the ThrottlesLogins trait, we can automatically throttle
                    // the login attempts for this application. We'll key this by the username and
                    // the IP address of the client making these requests into this application.
                    if ($this->hasTooManyLoginAttempts($request)) {
                        $this->fireLockoutEvent($request);

                        return $this->sendLockoutResponse($request);
                    }
                    $this->incrementLoginAttempts($request);  // Si el usuario intenta muchas veces logearse este metodo le pondra un limite de logeo
                    return Redirect::back()->with('mensaje-error', 'Usuario no registrado.');

        }


    }

}
