<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/main');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function viewUser()
    {
        $users = User::all();
        return view("user.view-user", ['data' => $users]);
    }

    public function inputUser()
    {
        return view('user.input-user');
    }

    public function saveUser(Request $request)
    {
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|max:150',
            'status' => 'required|max:7',
            'nama_ptgs' => 'required|max:30',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'status' => $request->status,
            'nama_ptgs' => $request->nama_ptgs,
        ]);

        return redirect('/view-user')->with('success', 'User berhasil ditambahkan.');
    }

    public function editUser($id_user)
    {
        $user = User::findOrFail($id_user);
        return view("user.edit-user", ['data' => $user]);
    }

    public function updateUser(Request $request, $id_user)
    {
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'nullable|max:150',
            'status' => 'required|max:7',
            'nama_ptgs' => 'required|max:30',
        ]);

        $user = User::findOrFail($id_user);

        $data = [
            'username' => $request->username,
            'status' => $request->status,
            'nama_ptgs' => $request->nama_ptgs,
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect('/view-user')->with('success', 'User berhasil diperbarui.');
    }

    public function hapusUser($id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();

        return redirect('/view-user')->with('success', 'User berhasil dihapus.');

    }
}
