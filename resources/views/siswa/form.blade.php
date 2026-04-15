<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Page Create</title>
    </head>
    <body>

        @session('error')
            <div>
            {{ session('error ')}}    
            </div>    
        @endsession

        @if ($errors->any())
            <div>
                <strong>perhatian</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>            
        @endif
        
        <h1>Form siswa</h1>
        <form action="{{ url('siswa',@$siswa->id) }}" method="POST">
            
            @csrf
            
            @if (!empty(@$siswa))
                @method('PATCH')
            @endif
            
            NIS: 
                <input type="text" name="nis" value="{{old ('nis', @$siswa ->nis) }}"> <br>
            Nama lengkap: 
                <input type="text" name="nama_lengkap" value="{{old  ('nama_lengkap',@$siswa ->nama_lengkap) }}"> <br>
            Jenis kelamin
                <label><input type="radio" name="jk" value="L" {{ old('jk', @$siswa->jk) == 'L' ? 'checked' : '' }}> Laki laki</label>
                <label><input type="radio" name="jk" value="P" {{ old('jk', @$siswa->jk) == 'P' ? 'checked' : '' }}> Perempuan</label>
                <br>
            Golongan Darah:
                <select name="golongan_darah" id="">
                    <option value="">Pilih Golongan darah</option>    
                    <option value="A"  {{ old('goldar', @$siswa ->golongan_darah ) == 'A' ? "selected" : "" }}>A</option>
                    <option value="B"  {{ old('goldar', @$siswa ->golongan_darah ) == 'B' ? "selected" : "" }}>B</option>
                    <option value="AB" {{ old('goldar', @$siswa ->golongan_darah ) =='AB'  ? "selected" : "" }}>AB</option>
                    <option value="O"  {{ old('goldar', @$siswa ->golongan_darah ) == 'O' ? "selected" : "" }}>O</option>
                </select> <br>
                <input type="submit" value="Simpan">
        </form>
    </body>
</html>