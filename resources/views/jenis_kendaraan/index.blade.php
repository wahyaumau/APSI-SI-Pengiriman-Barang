@extends('template')


@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Jenis Kendaraan</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('jenis_kendaraan.create')}}"><button class="btn btn-success float-right">Tambah Jenis Kendaraan</button></a>
        </div>
    </div>
    @if (\Session::has('success'))
    <div class="row">
        <div class="alert alert-success col-md-12">
            <p>{{ \Session::get('success') }}</p>
        </div>
    </div>
    @elseif (\Session::has('fail'))
    <div class="row">
        <div class="alert alert-danger col-md-12">
            <p>{{ \Session::get('fail') }}</p>
        </div>
    </div>
    @endif

    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis</th>
                    <th>Kapasitas</th>                    
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listJenisKendaraan as $jenisKendaraan)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$jenisKendaraan->nama_jenis}}</td>                    
                    <td>{{$jenisKendaraan->kapasitas}}</td>
                    <td>
                        <a href="{{ route('jenis_kendaraan.edit', $jenisKendaraan)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('jenis_kendaraan.destroy', $jenisKendaraan)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <div class="text-center">
                {!!$listJenisKendaraan->links(); !!}
            </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
