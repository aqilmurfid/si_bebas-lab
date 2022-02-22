<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswaImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    public function index()
    {
        $items=User::where('role', 'MAHASISWA')->get();

        return view('pages.ka_lab.data-mahasiswa.index', [
            'items'=>$items
        ]);
    }

    public function create()
    {
        return view('pages.ka_lab.data-mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'npm' => 'required|string|max:255|unique:users',
            'email' => 'required|string|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('data-mahasiswa.index');
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.ka_lab.data-mahasiswa.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
        ]);

        if ($request->email != $item->email) {
            $request->validate([
                'email' => 'required|string|max:255|unique:users',
            ]);
        }

        if ($request->npm != $item->npm) {
            $request->validate([
                'npm' => 'required|string|max:255|unique:users',
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $item->nama = $request->nama;
        $item->npm = $request->npm;
        $item->no_hp = $request->no_hp;
        $item->email = $request->email;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        return redirect()->route('data-mahasiswa.index');
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);

        $item->delete();

        return redirect()->route('data-mahasiswa.index');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        Excel::import(new MahasiswaImport, $file);

        return redirect()->route('data-mahasiswa.index');
    }
}
