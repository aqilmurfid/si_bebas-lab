<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DataController extends Controller
{
    public function profile()
    {
        $user = User::where('role', 'LABORAN')->first();

        return view('pages.laboran.profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::where('role', 'LABORAN')->first();

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email !== $user->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $user->nama = $request->nama;
        $user->nip = $request->nip;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('ka_lab.profile');
    }

    public function ka_lab()
    {
        $user = User::where('role', 'KEPALA LAB')->first();

        return view('pages.laboran.ka_lab', [
            'user' => $user
        ]);
    }

    public function update_ka_lab(Request $request)
    {
        $user = User::where('role', 'KEPALA LAB')->first();

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email !== $user->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $user->nama = $request->nama;
        $user->nip = $request->nip;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('ka_lab.kepala-lab');
    }
}
