<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function cek_surat($id)
    {
        $item = Surat::where('unique_id', $id)->first();
        return view('pages.user.cek-surat', [
            'item' => $item
        ]);
    }
}
