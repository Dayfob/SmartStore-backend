<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Cart;
use App\Models\User\User;
use App\Models\User\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getUser(Request $request): array
    {
        $userId = $request->user()->id;

        return User::whereId($userId)
            ->get()
            ->toArray();
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:user_users',
            'password' => 'required',
            'device_name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error']);
        }

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        if ($user->save()) {
            $stripeCustomer = $user->createOrGetStripeCustomer();
            // корзина
            $cart = new Cart();
            $cart->status = '-';
            $cart->user_id = $user->id;
            $cart->total_price = 0;
            $cart->save();

            // список желаний
            $wishlist = new Wishlist();
            $wishlist->status = '-';
            $wishlist->user_id = $user->id;
            $wishlist->save();
            $token = $user->createToken($request->device_name)->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Error']);
    }

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error']);
        }

        $userEmail = $request->get('email');
        $password = $request->get('password');

        $user = User::whereEmail($userEmail)->first();

        if (Hash::check($password, $user->getAttribute('password'))) {
            return response()->json(["token" => $user->createToken($request->get('device_name'))->plainTextToken]);
        }

        return response()->json(['The credentials provided are incorrect.']);
    }

    public function logout(Request $request): JsonResponse
    {
        if ($request->user()->forceFill(['api_token' => null,])->save()) {
            return response()->json(['message' => 'Successful']);
        }

        return response()->json(['message' => 'Error']);
    }


    public function updateUserData(Request $request): JsonResponse // надо проверить работоспособность
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email' => 'email|unique:user_users',
            'phone' => 'string',
            'iin' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error']);
        }

        $userId = $request->user()->id;

        $user = User::whereId($userId)
            ->get()->first();

        if ($request->exists("name")) {
            $user->name = $request->get("name");
        }
        if ($request->exists("email")) {
            $user->email = $request->get("email");
        }
        if ($request->exists("phone")) {
            $user->phone_number = $request->get("phone");
        }
        if ($request->exists("iin")) {
            $user->iin = $request->get("iin");
        }

        if ($user->save()) {
            return response()->json(['message' => 'Data updated successfully']);
        }

        return response()->json(['message' => 'Error']);
    }
}
