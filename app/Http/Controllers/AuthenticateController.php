<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Validation\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthenticateController extends Controller
{
    /**
     * Login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = User::where('email', $request->input('email'))->firstOrFail();
            return response()->json($user);
        } else {
            return response()->json(['errors' => 'Mauvais identifiants de connexion.'], 401);
        }
    }

    /**
     * Register new user to database.
     *
     * @param Request $request
     * @param UserValidator $userValidator
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request, UserValidator $userValidator)
    {
        $validator = Validator::make($request->all(), $userValidator->rules(), $userValidator->messages());

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        User::create([
            'email' => $request->input('email'),
            'name' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'api_token' => Str::random(60),
            'terms' => boolval($request->input('terms')),
        ]);

         return response()->json(['success' => 'Utilisateur enregistré avec succès.']);
    }
}
