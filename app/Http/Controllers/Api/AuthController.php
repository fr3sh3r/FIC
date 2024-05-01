<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // if (!auth()->attempt($request->only('email','password')))
        // {
        //     return response()->json([
        //         'message' => 'Invalid login details'
        //     ],401);
        // }

        // $user = auth()->user();
        // $token = $user->createToken('token')->plainTextToken;

        // return response()->json([
        //     'user' => $user,
        //     'token' => $token

        // ]);

        //login nya kita pakai yang lain
        //auth nya kita akan pakai yang SANCTUM
        //https://laravel.com/docs/11.x/sanctum
        //laravel sanctum ini menyediakan API TOKEN

        //proses dibawah ini setelah kita menginstall SANCTUM http://laravel.com Sanctum
        //pelajari dulu cara menginstall Sanctum
        //https://laravel.com/docs/10.x/sanctum
        //1. You may install Laravel Sanctum via the Composer package manager:
        // ketik di Terminal        composer require laravel/sanctum
        //2. Next, you should publish the Sanctum configuration and migration files using the vendor:publish Artisan command. The sanctum configuration file will be placed in your application's config directory:
        // ketik php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
        //3. Finally, you should run your database migrations. Sanctum will create one database table in which to store API tokens:
        //php artisan migrate


        //check if user is exist
        $user = User::where('email', $request->email)->first();

        //import dengan mengetik    use App\Models\User;  dibagian atas halaman ini

        //check if the password is correct
        // if (!$user || !password_verify($request->password,$user->password))
        // check passwordnya kita pakai hash


        if (!$user || !Hash::check($request->password, $user->password))
        //import fungsi Hash dengan menambahkan   use Illuminate\Support\Facades\Hash;    di bagian atas
        {
            return response([
                'message' => 'These credentials do not match our records.'
            ], 404);
        }

        //if user exist then generate token
        $token = $user->createToken('auth-token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    // selanjutnya kita buat logout agar tokennya bisa di CLEAR
    //logout
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
        }

        return response([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
