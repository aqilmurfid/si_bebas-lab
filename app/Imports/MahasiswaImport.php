<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            User::create([
                'nama' => $row[1],
                'npm' => $row[2],
                'password' => Hash::make($row[2]),
            ]);
        }
    }
}
