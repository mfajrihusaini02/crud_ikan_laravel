@extends('Crud_ikans.template')

@section('content')
    <div class="row mt-5 mb-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <a href="{{ route('crud_ikans.index') }}" class="btn btn-secondary"> <img src="https://image.flaticon.com/icons/png/512/271/271220.png" width="23px" height="23px"> </a>
            </div>
            <div class="float-left">
                <h2>Detail Ikan</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga : </strong>
                {{ $crud_ikan -> harga }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Ikan : </strong>
                {{ $crud_ikan -> jenis_ikan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penjual : </strong>
                {{ $crud_ikan -> penjual }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pembelian : </strong>
                {{ $crud_ikan -> created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar : </strong><br>
                <img src="{{ $crud_ikan -> gambar }}" width="100px">
            </div>
        </div>
    </div>
@endsection