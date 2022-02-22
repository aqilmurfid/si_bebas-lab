<?php

namespace App\Exports;

use App\Models\Surat;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuratExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Surat::with('user')->get();
    }

    public function map($mahasiswa): array
    {
        return [
            $mahasiswa->user->nama,
            $mahasiswa->user->npm,
            $mahasiswa->nomor_surat,
            Carbon::parse($mahasiswa->tanggal_ajuan)->translatedFormat('l, d F Y'),
            Carbon::parse($mahasiswa->tanggal_proses)->translatedFormat('l, d F Y'),
            Carbon::parse($mahasiswa->tanggal_selesai)->translatedFormat('l, d F Y'),
            $mahasiswa->status
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NPM',
            'Nomor Surat',
            'Tanggal Ajuan',
            'Tanggal Proses',
            'Tanggal Selesai',
            'Status',
        ];
    }
}
