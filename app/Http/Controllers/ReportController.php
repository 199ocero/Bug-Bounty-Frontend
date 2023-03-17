<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReportController extends Controller
{

    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('APP_API_URL') . '/api/report/user/all');

        return inertia('Report/Index', [
            'reports' => collect($response->json()['data'])
        ]);
    }

    public function create($id)
    {
        return inertia('Report/Create', [
            'program_id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'title' => 'required',
            'severity' => 'required',
            'status' => 'required',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post(env('APP_API_URL') . '/api/report', [
                'program_id' => $request->program_id,
                'title' => $request->title,
                'severity' => $request->severity,
                'status' => $request->status,
            ]);

        if ($response->successful()) {
            return redirect()->route('program.show', ['id' => $request->program_id]);
        } else {
            $errors = $response->json()['error'];
            return back()->withErrors($errors);
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->delete(env('APP_API_URL') . '/api/report/' . $id);

        return redirect()->route('report.index');
    }
}