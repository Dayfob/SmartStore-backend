<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
//        $userId = Auth::id();
        $userId = auth("api")->user();

//        dd($request);

        return User::whereId($userId)
            ->get()
            ->toArray();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:user_users',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Ошибка валидации']);
        }

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        if ($user->save()){
            auth("api")->login($user);
//            dd(auth("api")->user()); //способ логиниться с помощью сессий, см config/auth.php 45стр
            return response()->json($user);
        }

        return response()->json(['message' => 'Ошибка']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

//        $credentials = $request->only(['email', 'password']);


        $dataAttempt = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

//        $user = User::whereEmail($dataAttempt['name'])->get();



//        dd($dataAttempt);
//        dd(Auth::guard($dataAttempt));

//        if (Auth::attempt($dataAttempt)){ // по каким то причинам кажется тут не регистрируется пользователь
//            $user = Auth::user();
//            $token = md5(time()) . '.' . md5($request->email);
//            $user->forceFill(['api_token' => $token,])->save();
//
//            return response()->json(['token' => $user]);
//        }


//        if(Auth::attempt(['email' => $request->get('email'),
//            'password' => $request->get('password')])) {
//
//            dd(['email' => $request->get('email'),
//                'password' => $request->get('password')]);
//            $user = Auth::guard('web')->getLastAttempted(); // get hold of the user
//
//            // user credentials are correct. Issue a token and use it in next requests
//            // Notice false, false => no login is performed
//        } else {
//            // invalid credentials, act accordingly
//        }

        return response()->json(['message' => 'Предоставленные учетные данные не соответствуют.']);
    }

    public function logout(Request $request)
    {
        if ($request->user()->forceFill(['api_token' => null,])->save()) {
            return response()->json(['message' => 'Успешно']);
        }

        return response()->json(['message' => 'Ошибка']);
    }


    public function updateuserData(Request $request)
    {

    }
}
