@extends('template')


@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Barang</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('barang.create')}}"><button class="btn btn-success float-right">Tambah Barang</button></a>
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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>                    
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listBarang as $barang)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$barang->kode_barang}}</td>                    
                    <td>{{$barang->nama_barang}}</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('barang.destroy', $barang)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <div class="text-center">
                {!!$listBarang->links(); !!}
            </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
