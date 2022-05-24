<?php

namespace App\Http\Controllers;

use App\Exports\SuratExport;
use App\Models\Surat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::where('user_id',Auth::user()->id)->first();
        return view('pages.mahasiswa.index',[
            'surat' => $surat
        ]);
    }
    public function create()
    {
         return view ('pages.mahasiswa.create');
    }

    public function store()
    {
        $date = Carbon::now();
        Surat::create([
            'user_id'=>Auth::user()->id,
            'nama'=>Auth::user()->nama,
            'npm'=>Auth::user()->npm,
            'tanggal_ajuan'=>$date,
            'unique_id' => uniqid('surat-', microtime())
        ]);

        return redirect()->route('surat.index');
    }

    public function index_laboran()
    {
        $surat = Surat::where('status','Menunggu')->orWhere('status','Selesai')->orderByRaw("FIELD(status,'Menunggu','Selesai')")->get();
        return view('pages.laboran.index',[
            'surat' => $surat
        ]);
    }

    public function teruskan_surat($id)
    {
        $item = Surat :: findOrFail($id);
        $date = Carbon::now();

        $item->status = 'Proses';
        $item->tanggal_proses = $date;
        $item->save();

        return redirect()->route('laboran.surat.index');
    }

    public function simpan_nomor_surat(Request $request, $id)
    {
        $item = Surat :: findOrFail($id);

        $request->validate([
            'nomor_surat' => ['required', 'string', 'max:255']
        ]);

        $item->nomor_surat = $request->nomor_surat;
        $item->save();

        return redirect()->route('laboran.surat.index');
    }

    public function index_ka_lab()
    {
        $surat = Surat::where('status','Proses')->get();
        return view('pages.ka_lab.index',[
            'surat' => $surat
        ]);
    }

    public function terima_surat($id)
    {
        $item = Surat :: findOrFail($id);
        $date = Carbon::now();

        $item->status = 'Selesai';
        $item->tanggal_selesai = $date;
        $item->save();

        return redirect()->route('ka_lab.surat.index');
    }

    public function cetak_surat()
    {
        $surat = Surat::where('user_id',Auth::user()->id)->first();
        $kepala_lab = User::where('role', 'KEPALA LAB')->first();

        if ($surat->status === 'Selesai') {
            return view('pages.pdf.surat', [
                'surat' => $surat, 'kepala_lab' => $kepala_lab
            ]);
        }else {
            return redirect()->back();
        }

    }
    public function riwayat_surat(){
        $items = Surat::orderByRaw("FIELD(status,'Proses','Selesai')ASC")->get();

        return view('pages.riwayat-surat',[
            'items'=>$items
        ]);
    }

    public function preview_surat()
    {
        return view('pages.pdf.contoh-surat');
    }

    public function laporan()
    {
        return Excel::download(new SuratExport, 'surat.xlsx');
    }

    public function edit_riwayat_surat($id)
    {
        $item = Surat::findOrFail($id);

        return view('pages.ka_lab.edit-riwayat-surat', [
            'item' => $item
        ]);
    }

    public function update_riwayat_surat(Request $request, $id)
    {
        $item = Surat::findOrFail($id);

        $item->nomor_surat = $request->nomor_surat;
        $item->save();

        return redirect()->route('riwayat-surat');
    }

    public function delete_riwayat_surat($id)
    {
        $item = Surat::findOrFail($id);

        $item->delete();

        return redirect()->route('riwayat-surat');
    }
}
