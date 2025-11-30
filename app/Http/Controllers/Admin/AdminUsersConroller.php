<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminUsersConroller extends Controller
{
    public function users(){
        $userlist = User::select('id','name','email')->get();
        return Inertia::render('admin/user/pengguna' ,
        [
            'userlist' => $userlist
        ]
        );
    }
    public function delete(User $user){
        $user->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => ['required'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'password'   => ['required', 'min:6'],
            'role'       => ['required', 'in:admin,user'],
            'expired_at' => ['nullable', 'date'],
        ]);

        User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'password'   => bcrypt($validated['password']),
            'role'       => $validated['role'],
            'expired_at' => $validated['expired_at'],
        ]);

        return back();
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);

        return back()->with('success', 'User berhasil diperbarui.');
    }
}
