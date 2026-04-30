<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($tabel) ? 'Edit' : 'Tambah' }} Guru</title>
    <style>
        body  { font-family: Arial, sans-serif; padding: 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea {
            width: 100%; padding: 8px; margin-top: 4px;
            border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        .error  { color: red; font-size: 13px; }
        button  { margin-top: 16px; padding: 8px 20px; background: #4a90e2; color: white; border: none; border-radius: 4px; cursor: pointer; }
        a.back  { display: inline-block; margin-top: 10px; color: #4a90e2; }
    </style>
</head>
<body>
    <h1>{{ isset($tabel) ? 'Edit Data Guru' : 'Tambah Data Guru' }}</h1>

    {{-- Tentukan action & method berdasarkan mode edit atau tambah --}}
    @if(isset($tabel))
        <form action="{{ url('/guru/' . $tabel->id) }}" method="POST">
            @method('PUT')
    @else
        <form action="{{ url('/guru') }}" method="POST">
    @endif
        @csrf

        {{-- NIP --}}
        <label>NIP <span style="color:red">*</span></label>
        <input type="text"
               name="nip"
               maxlength="18"
               placeholder="Masukan 18 digit NIP"
               value="{{ old('nip', $tabel->nip ?? '') }}">
        @error('nip')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- Nama Guru --}}
        <label>Nama Guru <span style="color:red">*</span></label>
        <input type="text"
               name="nama_guru"
               placeholder="Masukan nama guru"
               value="{{ old('nama_guru', $tabel->nama_guru ?? '') }}">
        @error('nama_guru')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- Jenis Kelamin --}}
        <label>Jenis Kelamin <span style="color:red">*</span></label>
        <select name="jenis_kelamin">
            <option value="">-- Pilih --</option>
            @foreach(['Laki-laki', 'Perempuan'] as $jk)
                <option value="{{ $jk }}"
                    {{ old('jenis_kelamin', $tabel->jenis_kelamin ?? '') == $jk ? 'selected' : '' }}>
                    {{ $jk }}
                </option>
            @endforeach
        </select>
        @error('jenis_kelamin')
            <span class="error">{{ $message }}</span>
        @enderror

        {{-- Alamat --}}
        <label>Alamat <span style="color:red">*</span></label>
        <textarea name="alamat" rows="3" placeholder="Masukan alamat lengkap">{{ old('alamat', $tabel->alamat ?? '') }}</textarea>
        @error('alamat')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">{{ isset($tabel) ? 'Update' : 'Simpan' }}</button>
    </form>

    <a class="back" href="{{ url('/guru') }}">← Kembali ke daftar guru</a>
</body>
</html>