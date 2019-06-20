@extends('template')
@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">    
@endsection
@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Jenis Kendaraan') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jenis_kendaraan.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_jenis" class="col-md-2 col-form-label text-md-right">{{ __('Nama Jenis Kendaraan') }}</label>
                            <div class="col-md-8">
                                <input id="nama_jenis" type="text" class="form-control{{ $errors->has('nama_jenis') ? ' is-invalid' : '' }}" name="nama_jenis" value="{{ old('nama_jenis') }}" required autofocus>
                                @if ($errors->has('nama_jenis'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_jenis') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kapasitas" class="col-md-2 col-form-label text-md-right">{{ __('Kapasitas Jenis Kendaraan') }}</label>
                            <div class="col-md-8">
                                <input id="kapasitas" type="number" class="form-control{{ $errors->has('kapasitas') ? ' is-invalid' : '' }}" name="kapasitas" value="{{ old('kapasitas') }}" required autofocus>
                                @if ($errors->has('kapasitas'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kapasitas') }}</strong>
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
@section('javascripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2-multi').select2();

            $("#title").keyup(function () {
                var value = $(this).val();
                $("#slug").val(convertToSlug(value));
            }).keyup();    
        });
        
        function convertToSlug(str){
            return str.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
        }
    </script>    
@endsection
