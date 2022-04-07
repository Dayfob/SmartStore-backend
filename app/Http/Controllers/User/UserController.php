<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        $userId = $request->user()->id;

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
            'device_name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Ошибка валидации']);
        }

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        if ($user->save()) {
            $token = $user->createToken($request->device_name)->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Ошибка']);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Ошибка валидации']);
        }

        $userEmail = $request->get('email');
        $password = $request->get('password');

        $user = User::whereEmail($userEmail)->first();

        if (Hash::check($password, $user->getAttribute('password'))){
            return response()->json($user->createToken($request->get('device_name'))->plainTextToken);
        }

        return response()->json(['Предоставленные учетные данные неверны.']);
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
