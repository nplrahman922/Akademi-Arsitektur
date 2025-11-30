<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $modulCout = Module::count();
        $userCount = User::count();
        $userActifity = User::select('id','name','email',)
            ->latest()->take(15)->get();
        $modulActivity = Module::select('id','title','status')
            ->latest()->take(15)->get();
        return Inertia::render('admin/Dashboard',
        [
            'users' => $userCount ,
            'modul' => $modulCout,
            'userActivity' => $userActifity,
            'moduleActivity' => $modulActivity,
        ]
        );


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
