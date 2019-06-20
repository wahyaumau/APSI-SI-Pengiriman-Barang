@extends('template')


@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Gudang</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('gudang.create')}}"><button class="btn btn-success float-right">Tambah Gudang</button></a>
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
                    <th>Nama Gudang</th>
                    <th>Alamat</th>                    
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listGudang as $gudang)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$gudang->nama_gudang}}</td>                    
                    <td>{{$gudang->alamat_gudang}}</td>
                    <td>
                        <a href="{{ route('gudang.edit', $gudang)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('gudang.destroy', $gudang)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <div class="text-center">
                {!!$listGudang->links(); !!}
            </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
