<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
        }

        h5 {
            margin-bottom: -3px;
        }

        p,
        span {
            margin-bottom: -3px;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container" style="padding-left: 50px; padding-right: 50px;">
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <img src="logounib.png" alt="" srcset="" style=" width: 200px; margin-left: -280px;">
            </div>
            <div class="col-9 mt-4" style="margin-left: -240px;">
                <h5>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN RISET TEKNOLOGI</h5>
                <h5>UNIVERSITAS BENGKULU</h5>
                <h5>FAKULTAS TEKNIK</h5>
                <h5>LABORATORIUM SISTEM INFORMASI</h5>
                <p style=" margin-top: 5px; font-size: 16px;">Jl. W.R. Supratman Kandang Limun Bengkulu</p>
                <p style="font-size: 16px;">Telp. 0736-344087.21170 Ext. 227 Fax 0736-349134</p>
                <p style="font-size: 16px;">Laman: <a href="">www.informatika.ft.unib.ac.id</a></p>
            </div>
        </div>
        <hr style="border: 2px solid #000;">
        <h5 class="text-center font-weight-bold" style="text-decoration: underline; font-size: 22px;">SURAT KETERANGAN
        </h5>
        <p class="text-center" style="margin-top: -5px">Nomor : {{ $surat->nomor_surat }}</p>
        <p class="mt-4">Yang bertanda tangan dibawah ini :</p>
        <div class="row mt-3">
            <div class="col-2">
                <span>Nama</span>
            </div>
            <div class="col-6">
                <span>: {{ $kepala_lab->nama }}</span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                <span>NIP</span>
            </div>
            <div class="col-6">
                <span>: {{ $kepala_lab->nip }}</span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                <span>Jabatan</span>
            </div>
            <div class="col-6">
                <span>: Ketua Laboratorium Sistem Informasi</span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                <span>Instansi</span>
            </div>
            <div class="col-6">
                <span>: Fakultas Teknik Universitas Bengkulu</span>
            </div>
        </div>
        <p class="mt-4">Menerangkan dengan sesungguhnya bahwa :</p>
        <div class="row mt-3">
            <div class="col-2">
                <span>Nama</span>
            </div>
            <div class="col-6">
                <span>: {{ $surat->user->nama }}</span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                <span>NPM</span>
            </div>
            <div class="col-6">
                <span>: {{ $surat->user->npm  }}</span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                <span>Prodi</span>
            </div>
            <div class="col-6">
                <span>: Teknik Informatika</span>
            </div>
        </div>
        <p class="mt-3">Dengan ini menerangkan bahwa mahasiswa tersebut benar-benar telah menyelesaikan semua jurusan
            yang berhubungan dengan Laboratorium Komputer Teknik Informatika.</p>
        <p class="mt-4">Dengan demikian surat bebas peminjaman alat ini dibuat dengan sebenarnya untuk dapat
            dipergunakan seperlunya.</p>
        <div class="d-flex justify-content-end mt-5" style="margin-right: 70px;">
            <div class="column">
                <p>Bengkulu, {{ \Carbon\Carbon::parse($surat->tanggal_selesai)->translatedFormat('d F Y') }}</p>
                <p>Mengetahui</p>
                <div class="my-2">
                    {!! QrCode::size(150)->generate(route('home.cek-surat', $surat->unique_id)); !!}
                </div>
                <p>{{ $kepala_lab->nama }}</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        window.print()
    </script>
</body>

</html>
