<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('APP_API_URL') . '/api/program');

        return inertia('Home/Index', [
            'programs' => collect($response->json())
        ]);
    }

    public function show($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('APP_API_URL') . '/api/program/' . $id);

        return inertia('Home/Show', [
            'program' => collect($response->json()['data'])
        ]);
    }

    public function showByUser($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('APP_API_URL') . '/api/program/' . $id . '/user');

        return inertia('Home/User/Show', [
            'program' => collect($response->json()['data'])
        ]);
    }

    public function showByUserEdit($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('APP_API_URL') . '/api/program/' . $id . '/user');

        return inertia('Home/User/Edit', [
            'program' => collect($response->json()['data'])
        ]);
    }
    public function showAllByUser()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('APP_API_URL') . '/api/program/user/all');

        return inertia('Home/User/Index', [
            'programs' => collect($response->json()['data'])
        ]);
    }

    public function update(Request $request, $id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])
            ->put(env('APP_API_URL') . '/api/program/' . $id, [
                'name' => $request->name,
                'pentesting_start_date' => $request->pentesting_start_date,
                'pentesting_end_date' => $request->pentesting_end_date,
            ]);

        dd($response->json());
        // if ($response->successful()) {
        //     return redirect()->route('program.show.by-user', ['program_id' => $id]);
        // } else {
        //     $errors = $response->json()['error'];
        //     return back()->withErrors($errors);
        // }

    }
}