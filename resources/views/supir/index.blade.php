@extends('template')


@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Supir</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('supir.create')}}"><button class="btn btn-success float-right">Tambah Supir</button></a>
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
                    <th>Nama Supir</th>
                    <th>Alamat Supir</th>
                    <th>SIM</th>                    
                    <th>Jenis Supir</th>                    
                    <!-- <th>Created Time</th> -->
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listSupir as $supir)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$supir->nama_supir}}</td>
                    <td>{{$supir->alamat_supir}}</td>
                    <td>{{$supir->sim}}</td>
                    <td>{{$supir->jenisSupir->nama_jenis_supir}}</td>                    
                    <td>
                        <a href="{{ route('supir.edit', $supir)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('supir.destroy', $supir)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <div class="text-center">
                {!!$listSupir->links(); !!}
            </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
