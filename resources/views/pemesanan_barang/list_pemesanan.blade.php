@extends('template')

@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>List Pemesanan</h3>            
        </div>        
    </div>

    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>
                <tr>
                    <th rowspan="2">Kode Transaksi</th>
                    <th rowspan="2">Waktu Pemesanan</th>                    
                    <th rowspan="2">Status Pemesanan</th>                    
                    <th colspan="2">List Barang</th>                                        
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach($listPemesanan as $pemesanan)
                @if($pemesanan->barang->count()>0)
                @foreach($pemesanan->barang as $barang)

                <tr>                                                               
                    
                    <td>@if ($loop->iteration == 1) {{$pemesanan->kode_penjualan}} @endif</td>
                    <td>@if ($loop->iteration == 1) {{$pemesanan->tanggal_pembelian}} @endif</td>
                    <td>@if ($loop->iteration == 1) {{ $pemesanan->status? 'Diterima':'Diproses' }} @endif</td>
                    
                    
                    <td>{{$barang->nama_barang}}</td>                    
                    <td>{{$barang->pivot->jumlah_barang}}</td>                                       
                </tr>
                @endforeach
                @endif
                @endforeach
            
            </tbody>
        </table>        
    </div>
</div>

@endsection
