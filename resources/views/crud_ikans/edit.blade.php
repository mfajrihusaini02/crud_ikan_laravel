@extends('crud_ikans.template')

@section('content')
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <a href="{{ route('crud_ikans.index') }}" class="btn btn-secondary"> <img src="https://image.flaticon.com/icons/png/512/271/271220.png" width="23px" height="23px"></a>
            </div>
            <div class="float-left">
                <h2>Edit Koleksi</h2>
            </div>
        </div>
    </div>

    @if ($errors -> any())
        <div class="alert alert-danger">
            <strong>Whoopss!</strong> There were some problem with your input. <br><br>
            <ul>
                @foreach ($errors -> any() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('crud_ikans.update', $crud_ikan -> id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga : </strong>
                    <input type="text" name="harga" id="harga" value="{{ $crud_ikan -> harga }}" class="form-control" placeholder="Harga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Ikan : </strong>
                    <select name="jenis_ikan" id="jenis_ikan" class="form-control">
                        <option value="" disabled>-- Pilih --</option>
                        <option value="Kecil" {{ ($crud_ikan -> jenis_ikan === 'Kecil') ? 'Selected' : '' }} >Kecil</option>
                        <option value="Menengah" {{ ($crud_ikan -> jenis_ikan === 'Menengah') ? 'Selected' : '' }} >Menengah</option>
                        <option value="Besar" {{ ($crud_ikan -> jenis_ikan === 'Besar') ? 'Selected' : '' }} >Besar</option>
                    </select>
                    <!-- <input type="text" name="jenis_ikan" id="jenis_ikan" value="{{ $crud_ikan -> jenis_ikan }}" class="form-control"> -->
                    <!-- <textarea name="jenis_ikan" id="jenis_ikan" class="form-control" style="height: 150px;"> {{ $crud_ikan -> jenis_ikan }} </textarea> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penjual : </strong>
                    <input type="text" name="penjual" id="penjual" value="{{ $crud_ikan -> penjual }}" class="form-control" placeholder="Penjual">
                </div>
            </div>
            <div class="col-xs 12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gambar :</strong>
                    <input type="file" name="gambar" id="gambar" class="form-control" value="{{ $crud_ikan -> gambar }}">atau
                    <input type="text" name="gambar" id="gambar" class="form-control" value="{{ $crud_ikan -> gambar }}">Sebelumnya : {{ $crud_ikan -> gambar }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection