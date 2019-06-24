@extends('template')

@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Kode Transaksi : {{ $penjualan->kode_penjualan }}</h3>
            <p>Nama Pelanggan : {{ $pelanggan->nama }}</p>
            <p>Alamat Pelanggan : {{ $pelanggan->alamat }}</p>
        </div>
        <div class="col-md-4">
            <a href="{{route('pemesanan.barang.create.barang', $penjualan)}}"><button class="btn btn-success float-right">Tambah Barang</button></a>
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
                    <th>Nama Barang</th>                    
                    <th>Jumlah Barang</th>                    
                    <th>Harga Satuan</th>
                    <th>Harga Total</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($listBarang as $barang)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$barang->nama_barang}}</td>                    
                    <td>{{$barang->pivot->jumlah_barang}}</td>                    
                    <td>{{$barang->pivot->harga_barang}}</td>                    
                    <td>{{$barang->pivot->jumlah_barang * $barang->pivot->harga_barang}}</td>                    
                    {{-- <td>{{$armada->jenisKendaraan->kapasitas}}</td>
                    <td>
                        <a href="{{ route('armada.edit', $armada)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('armada.destroy', $armada)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
            
            </tbody>
        </table>
        <form action="{{ route('pelanggan.dashboard')}}" method="get" onsubmit="return confirm('Submit pesanan?')">
            @csrf                          
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection
