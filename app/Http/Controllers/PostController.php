<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengambil data terakhir dan pagination 10 list
        $posts = Post::latest() -> paginate(10);

        //mengirim variabel $posts ke halaman view posts/index.blade.php
        //include dengan number index
        return view('posts.index', compact('posts')) -> with('i', (request() -> input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan halaman create
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //membuat validasi untuk title dan content wajib diisi
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        /**
         * Insert setiap request dari form ke dalam database via model
         * jika menggunakan metode ini, maka nama field dan nama form harus sama
         */
        Post::create($request -> all());

        //redirect jika sukses menyimpan data
        return redirect() -> route('posts.index') -> with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        /**
         * Dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
         * berdasarkan 'id' yang dipilih
         * href = "{{ route('posts.show', $post -> id) }}"
         */  
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        /**
         * Dengan berdasarkan resouce, kita bisa memanfaatkan model sebagai parameter
         * berdasarkan 'id' yang dipilih
         * href = {{ route('posts.edit', $post -> id) }}
         */
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Membuat validasi untuk title dan content wajib diisi
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirim
        $post -> update($request -> all());

        //Setelah berhasil mengubah data
        return redirect() -> route('posts.index') -> with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        $post -> delete();

        return redirect() -> route('posts.index') -> with('success', 'Post deleted successfully');  
    }
}
