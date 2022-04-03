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
        $userId = Auth::id();

        return User::whereId($userId)
            ->get()
            ->toArray();
    }

    public function register(Request $request)
    {
        //выходит ошибка при использовании валидации, иначе пользователь регистрируется без

//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required',
//        ]);
//
//        if($validator->fails()){
//            return response()->json(['message' => 'Ошибка валидации']);
//        }
//        dd($request);


        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        if ($user->save()){
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


        if (Auth::attempt($credentials)) { // по каким то причинам кажется тут не регистрируется пользователь
            $user = Auth::user();
            $token = md5(time()) . '.' . md5($request->email);
            $user->forceFill(['api_token' => $token,])->save();

            return response()->json(['token' => $user]);
        }

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
