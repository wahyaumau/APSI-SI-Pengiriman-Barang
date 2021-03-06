@extends('template')

@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">    
@endsection

@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Barang') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('barang.update', $barang) }} ">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="kode_barang" class="col-md-2 col-form-label text-md-right">{{ __('Kode Barang') }}</label>
                            <div class="col-md-8">
                                <input id="kode_barang" type="text" class="form-control{{ $errors->has('kode_barang') ? ' is-invalid' : '' }}" name="kode_barang" value="{{ $barang->kode_barang }}" required autofocus>
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
                                <input id="nama_barang" type="text" class="form-control{{ $errors->has('nama_barang') ? ' is-invalid' : '' }}" name="nama_barang" value="{{ $barang->nama_barang }}" required autofocus>
                                @if ($errors->has('nama_barang'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_barang') }}</strong>
                                </span>
                                @endif
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
