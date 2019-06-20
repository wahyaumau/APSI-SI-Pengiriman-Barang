@extends('template')


@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Armada</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('armada.create')}}"><button class="btn btn-success float-right">Tambah Armada</button></a>
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
                    <th>Plat Nomor</th>
                    <th>Jenis Kendaraan</th>                    
                    <th>Kapasitas</th>                    
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listArmada as $armada)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$armada->plat_nomor}}</td>                    
                    <td>{{$armada->jenisKendaraan->nama_jenis}}</td>                    
                    <td>{{$armada->jenisKendaraan->kapasitas}}</td>
                    <td>
                        <a href="{{ route('armada.edit', $armada)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('armada.destroy', $armada)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <div class="text-center">
                {!!$listArmada->links(); !!}
            </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
