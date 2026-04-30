<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>kelas</title>
    </head>

        
    <body>
        <h1> ini adalah contoh tabel yang data nya dari xampp</h1>

        @session('succes')
            <h4>
                {{  session('succes') }}
            </h4>
        @endsession
    
        @session('error')
            <h4 >
                {{session('error')  }}
            </h4>
        @endsession

        <a href="{{ url ('/kelas/create') }}">Tambah data</a> <br>

        <table border="1">
            <tr align="center">
                <td>No</td>
                <td>Jurusan</td>  
                <td>Kelas</td>  
                <td>Lokasi Kelas</td>  
                <td>Wali kelas</td>  
                <td colspan="2" >aksi</td>  
            </tr>  
            
            @foreach ($t_kelas as $row )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$row -> jurusan}}</td>
                    <td>{{$row -> nama_kelas}}</td>
                    <td>{{$row -> lokasi_kelas}}</td>
                    <td>{{$row -> nama_wali_kelas}}</td>
                    <td><a href="{{ url ('/kelas/edit/' . $row ->id )}}">EDIT</a></td>
                    <td>
                        <form action="{{ url ('/kelas' , $row ->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">DELETE</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </table>            
    </body>
</html>