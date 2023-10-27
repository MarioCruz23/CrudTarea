<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function login(Request $request){
        if (!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['status' => 401, 'message' => 'NO AUTORIZADO']);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
            ->json([
                'status' => 200,
                'message' => 'muy bien',
                'accesToken' => $token,
                'token_type' => 'Bearer',
                'user'=>$user,
            ]);

    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'CESION CERRADA CORRECTAMENTE'
        ];
    }
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
    protected $redirectTo = '/'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
}
