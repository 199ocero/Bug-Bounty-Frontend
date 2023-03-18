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
            return redirect()->route('program.show', ['id' => $request->program_id])
                ->with('success', 'Report created successfully.');
        } else {
            $errors = $response->json()['error'];
            return back()->withErrors($errors);
        }
    }

    public function showByUserEdit($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get(env('APP_API_URL') . '/api/report/' . $id . '/user');

        return inertia('Report/Edit', [
            'report' => collect($response->json()['data'])
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'severity' => 'required',
            'status' => 'required',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->put(env('APP_API_URL') . '/api/report/' . $id, [
                'title' => $request->title,
                'severity' => $request->severity,
                'status' => $request->status,
            ]);

        if ($response->successful()) {
            return redirect()->route('report.index')
                ->with('success', 'Report updated successfully.');
            ;
        } else {
            $errors = $response->json()['error'];
            return back()->withErrors($errors);
        }
    }

    public function destroy($id)
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->delete(env('APP_API_URL') . '/api/report/' . $id);

        return redirect()->route('report.index')
            ->with('success', 'Report created successfully.');
        ;
    }
}