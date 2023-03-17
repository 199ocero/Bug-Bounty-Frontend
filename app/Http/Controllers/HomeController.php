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
        $request->validate([
            'name' => 'required',
            'pentesting_start_date' => 'required',
            'pentesting_end_date' => 'required',
        ]);

        $startDate = $request->pentesting_start_date;
        if (strpos($startDate, "T") !== false) {
            $startDateFinal = str_replace("T", " ", $startDate);
        } else {
            $startDateFinal = $startDate;
        }

        $endDate = $request->pentesting_end_date;
        if (strpos($endDate, "T") !== false) {
            $endDateFinal = str_replace("T", " ", $endDate);
        } else {
            $endDateFinal = $endDate;
        }

        $name = $request->name ? $request->name : "";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])
            ->put(env('APP_API_URL') . '/api/program/' . $id, [
                'name' => $name,
                'pentesting_start_date' => $startDateFinal,
                'pentesting_end_date' => $endDateFinal,
            ]);

        if ($response->successful()) {
            return redirect()->route('program.show.by-user', ['program_id' => $id]);
        }

    }

    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->delete(env('APP_API_URL') . '/api/program/' . $id);

        return redirect()->route('program.show.all');
    }
}