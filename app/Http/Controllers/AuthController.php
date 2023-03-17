<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login()
    {
        return inertia('Auth/Login');
    }

    public function register()
    {
        return inertia('Auth/Register');
    }

    public function loginStore(Request $request)
    {
        $response = Http::post(env('APP_API_URL') . '/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $user = $response->json()['user'];
            $token = $response->json()['token'];

            $request->session()->put('token', $token);
            $request->session()->put('user', $user);
        } else {
            $errors = $response->json()['error'];
            return back()->withErrors($errors);
        }

        return redirect()->route('program.index');
    }

    public function registerStore(Request $request)
    {
        $response = Http::post(env('APP_API_URL') . '/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        if ($response->successful()) {
            $user = $response->json()['user'];
            $token = $response->json()['token'];

            $request->session()->put('token', $token);
            $request->session()->put('user', $user);
        } else {
            $errors = $response->json()['error'];
            return back()->withErrors($errors);
        }

        return redirect()->route('program.index');
    }

    public function destroy(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post(env('APP_API_URL') . '/api/logout');

        if ($response->successful()) {
            session()->forget('user');
            session()->forget('token');
            return redirect()->route('login');
        } else {
            session()->forget('user');
            session()->forget('token');
            return redirect()->route('login');
        }
    }
}