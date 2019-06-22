@extends('template')
@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Armada') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('armada.update', $armada) }} ">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="plat_nomor" class="col-md-2 col-form-label text-md-right">{{ __('Plat nomor Kendaraan') }}</label>

                            <div class="col-md-8">
                                <input id="plat_nomor" type="text" class="form-control{{ $errors->has('plat_nomor') ? ' is-invalid' : '' }}" name="plat_nomor" value="{{ $armada->plat_nomor }}" required autofocus>

                                @if ($errors->has('plat_nomor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plat_nomor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!--     <div class="form-group row">
                            <label for="kode_jenis_kendaraan" class="col-md-2 col-form-label text-md-right">{{ __('Jenis Kendaraan') }}</label>

                            <div class="col-md-8">
                                <input id="kode_jenis_kendaraan" type="text" class="form-control{{ $errors->has('kode_jenis_kendaraan') ? ' is-invalid' : '' }}" name="kode_jenis_kendaraan" value="{{ $armada->kode_jenis_kendaraan }}" required autofocus>

                                @if ($errors->has('kode_jenis_kendaraan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kode_jenis_kendaraan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                   

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
