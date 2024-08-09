<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signIn(Request $request)
    {
        $email = 'email' . Carbon::now()->getTimestampMs() . '@idea.com';
        $user = User::updateOrCreate(
            ['ip' => $request->ip()],
            [
                'name' => 'username',
                'password' => 'password',
                'email' => $email,
            ],
        );

        if (boolval($user)) {
            if (Auth::attempt(['email' => $email, 'password' => 'password', 'ip' => $request->ip()])) {
                return response()->json(
                    [
                        'status' => true,
                        'data' => [
                            'token' => $request->user()->createToken($request->user()->id)->plainTextToken,
                        ],
                    ]
                );
            }
        }
        return response()->json([
            'status' => false,
            'message' =>  'هناك خطأ، لم يتم إكمال المصادقة.',
        ]);
    }
}
