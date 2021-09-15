@extends('crud_ikans.template')

@section('content')
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> <img src="https://image.flaticon.com/icons/png/512/5098/5098585.png" width="65px"> Kolektor Ikan Cupang</h2>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <a href="{{ route('crud_ikans.create') }}" class="btn btn-success"> <img src="https://image.flaticon.com/icons/png/512/983/983901.png" width="25px" height="25px"> Tambah data</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-hover">
        <tr class="text-center" style="background-color: sandybrown;">
            <th width="20px">No</th>
            <th>Harga</th>
            <th>Jenis Ikan</th>
            <th>Penjual</th>
            <th>Tanggal Pembelian</th>
            <th>Gambar</th>
            <th width="280px" class="text-center">Action</th>
        </tr>

        @foreach ($crud_ikans as $crud_ikan)
        <tr class="text-center">
            <td>{{ ++$i }}</td>
            <td>{{ $crud_ikan -> harga }}</td>
            <td>{{ $crud_ikan -> jenis_ikan }}</td>
            <td>{{ $crud_ikan -> penjual }}</td>
            <td class="text-center">{{ $crud_ikan -> created_at }}</td>
            <td> <img src="{{ $crud_ikan -> gambar }}" width="80px"> </td>
            <!-- <td>
                <form action="" method="post"></form>
            </td> -->
            <td class="text-center">
                <form action="{{ route('crud_ikans.destroy', $crud_ikan -> id) }}" method="POST">
                    <a href="{{ route('crud_ikans.show', $crud_ikan -> id) }}" class="btn btn-info btn-sm"> <img src="https://image.flaticon.com/icons/png/512/159/159604.png" width="25px" height="25px"> Show</a>
                    <a href="{{ route('crud_ikans.edit', $crud_ikan -> id) }}" class="btn btn-primary btn-sm"> <img src="https://image.flaticon.com/icons/png/512/159/159029.png" width="25px" height="25px"> Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <img src="https://image.flaticon.com/icons/png/512/565/565492.png" width="25px" height="25px"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- <marquee>- Ikan Cupang - Ikan Cupang - Ikan Cupang -</marquee> -->

    {!! $crud_ikans -> links() !!}
@endsection