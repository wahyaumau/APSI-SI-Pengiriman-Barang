@extends('template')
@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">    
@endsection
@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Barang') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('barang.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="kode_barang" class="col-md-2 col-form-label text-md-right">{{ __('Kode Barang') }}</label>
                            <div class="col-md-8">
                                <input id="kode_barang" type="number" class="form-control{{ $errors->has('kode_barang') ? ' is-invalid' : '' }}" name="kode_barang" value="{{ old('kode_barang') }}" required autofocus>
                                @if ($errors->has('kode_barang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kode_barang') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_barang" class="col-md-2 col-form-label text-md-right">{{ __('Nama Barang') }}</label>
                            <div class="col-md-8">
                                <input id="nama_barang" type="text" class="form-control{{ $errors->has('nama_barang') ? ' is-invalid' : '' }}" name="nama_barang" value="{{ old('nama_barang') }}" required autofocus>
                                @if ($errors->has('nama_barang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_barang') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>        
                        <div class="form-group row">
                            <label for="satuan" class="col-md-2 col-form-label text-md-right">{{ __('Satuan Barang') }}</label>
                            <div class="col-md-8">
                                <input id="satuan" type="text" class="form-control{{ $errors->has('satuan') ? ' is-invalid' : '' }}" name="satuan" value="{{ old('satuan') }}" required autofocus>
                                @if ($errors->has('satuan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('satuan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                                        
                        <div class="form-group row">
                            <label for="harga" class="col-md-2 col-form-label text-md-right">{{ __('Harga Barang') }}</label>
                            <div class="col-md-8">
                                <input id="harga" type="number" class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}" name="harga" value="{{ old('harga') }}" required autofocus>
                                @if ($errors->has('harga'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('harga') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="kode_supplier" class="col-md-2 col-form-label text-md-right">{{ __('Supplier Penyedia') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2-single" name="kode_supplier">
                                    @foreach($listSupplier as $supplier)
                                    <option value="{{$supplier->kode_supplier}}">{{$supplier->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2-multi').select2();  
        });
    </script>    
@endsection
