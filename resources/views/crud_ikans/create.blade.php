@extends('posts.template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <a href="{{ route('crud_ikans.index') }}" class="btn btn-secondary"> <img src="https://image.flaticon.com/icons/png/512/271/271220.png" width="23px" height="23px"></a>
            </div>
            <div class="float-left">
                <h2>Masukkan Koleksi Baru</h2>
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

    <form action="{{ route('crud_ikans.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga : </strong>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Ikan : </strong>
                    <select name="jenis_ikan" id="jenis_ikan" class="form-control">
                        <option value="" disabled>-- Pilih --</option>
                        <option value="Kecil">Kecil</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Besar">Besar</option>
                    </select>
                    <!-- <input type="number" name="content" id="content" class="form-control" placeholder="Jenis Ikan"> -->
                    <!-- <textarea name="content" id="content" class="form-control" style="height: 150px;"></textarea> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penjual : </strong>
                    <input type="text" name="penjual" id="penjual" class="form-control" placeholder="Penjual">
                </div>
            </div>
            <div class="col-xs 12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gambar :</strong>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <strong>atau</strong>
                    <input type="text" name="gambar" id="gambar" class="form-control" placeholder="Link gambar">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection