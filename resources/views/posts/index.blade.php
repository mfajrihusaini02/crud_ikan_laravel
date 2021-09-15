@extends('posts.template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb" style="background-color: #5F9EA0; margin-bottom: 10px">
            <div class="float-left">
                <h2>Tutorial CRUD</h2>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <a href="{{ route('posts.create') }}" class="btn btn-success"> <img src="https://image.flaticon.com/icons/png/512/983/983901.png" width="25px" height="25px"> Tambah data</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-hover">
        <tr class="text-center">
            <th width="20px">No</th>
            <th>Harga</th>
            <th>Jenis Ikan</th>
            <th>Penjual</th>
            <th>Tanggal Pembelian</th>
            <th width="280px" class="text-center">Action</th>
        </tr>

        @foreach ($posts as $post)
        <tr class="text-center">
            <td>{{ ++$i }}</td>
            <td>{{ $post -> title }}</td>
            <td>"Jenis Ikan"</td>
            <td>{{ $post -> content }}</td>
            <td class="text-center">{{ $post -> created_at }}</td>
            <td class="text-center">
                <form action="{{ route('posts.destroy', $post -> id) }}" method="POST">
                    <a href="{{ route('posts.show', $post -> id) }}" class="btn btn-info btn-sm"> <img src="https://image.flaticon.com/icons/png/512/159/159604.png" width="25px" height="25px"> Show</a>
                    <a href="{{ route('posts.edit', $post -> id) }}" class="btn btn-primary btn-sm"> <img src="https://image.flaticon.com/icons/png/512/159/159029.png" width="25px" height="25px"> Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <img src="https://image.flaticon.com/icons/png/512/565/565492.png" width="25px" height="25px"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $posts -> links() !!}
@endsection