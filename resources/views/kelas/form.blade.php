<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nambah kolom</title>
    </head>
    <body>

        @session('error')
            <div>
                {{ session('error') }}
            </div>
        @endsession

        @if ($errors ->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        @endif

        <form action="{{ url('kelas', @$tabel ->id) }}" method="POST">

            <h1>Form siswa</h1>
            
            @csrf
            @if (!empty(@$tabel))
                @method('PATCH')
            @endif

            Nama Wali Kelas: <input type="text" name="nama_wali_kelas" value="{{ old ('nama_wali_kelas', @$tabel ->nama_wali_kelas) }}"> <br>
            Lokasi Kelas: <input type="text" name="lokasi_kelas" value="{{ old ('lokasi_kelas', @$tabel ->lokasi_kelas) }}"> <br>

            Jurusan:
            <select name="jurusan" id="">
                <option value="">Pilih Jurusan</option>
                <option value="RPL"  {{ old ('jurusan', @$tabel ->jurusan) == 'RPL'  ? "selected" : "" }} >RPL</option>
                <option value="TITL" {{ old ('jurusan', @$tabel ->jurusan) == 'TITL' ? "selected" : "" }} >TITL</option>
                <option value="TOI"  {{ old ('jurusan', @$tabel ->jurusan) == 'TOI'  ? "selected" : "" }} >TOI</option>
                <option value="TAV"  {{ old ('jurusan', @$tabel ->jurusan) == 'TAV'  ? "selected" : "" }} >TAV</option>
                <option value="DKV"  {{ old ('jurusan', @$tabel ->jurusan) == 'DKV'  ? "selected" : "" }} >DKV</option>
                <option value="TKJ"  {{ old ('jurusan', @$tabel ->jurusan) == 'TKJ'  ? "selected" : "" }} >TKJ</option>
            </select>

            {{-- Nama kelas --}}
            <label><input type="radio" name="nama_kelas" value="1" {{ old ('nama_kelas', @$tabel ->nama_kelas) == '1' ? 'checked' : '' }}> 1</label>
            <label><input type="radio" name="nama_kelas" value="2" {{ old ('nama_kelas', @$tabel ->nama_kelas) == '2' ? 'checked' : '' }}> 2</label>
            <label><input type="radio" name="nama_kelas" value="3" {{ old ('nama_kelas', @$tabel ->nama_kelas) == '3' ? 'checked' : '' }}> 3</label>
            <br>
            <br>

            <input type="submit" value="Simpan">
            
        </form>
    </body>
</html>