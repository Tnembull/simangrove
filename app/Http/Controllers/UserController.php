<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->get();

        $roles = Role::withCount('users')->get(); // Untuk informasi jumlah pengguna per role
        return view('users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|exists:roles,name',
            'status' => 'required|boolean',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'], // akan dihash via mutator
            'status' => $validated['status'],
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'nullable|string|max:50',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|exists:roles,name',
            'status' => 'required|boolean',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->update([
            'name' => $validated['name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);

        if (!empty($validated['password'])) {
            $user->password = $validated['password']; // hashed by mutator
            $user->save();
        }

        $user->syncRoles([$validated['role']]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri.');
        }

        $user->delete();
        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
