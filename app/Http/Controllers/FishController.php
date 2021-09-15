<?php

namespace App\Http\Controllers;

use App\Models\crud_ikan;
use Illuminate\Http\Request;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crud_ikans = crud_ikan::latest() -> paginate(10);

        return view('crud_ikans.index', compact('crud_ikans')) -> with('i', (request() -> input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud_ikans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'harga' => 'required',
            'jenis_ikan' => 'required',
            'penjual' => 'required',
            'gambar' => 'required'
        ]);

        crud_ikan::create($request -> all());

        return redirect() -> route('crud_ikans.index') -> with('success', 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(crud_ikan $crud_ikan)
    {
        return view('crud_ikans.show', compact('crud_ikan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(crud_ikan $crud_ikan)
    {
        return view('crud_ikans.edit', compact('crud_ikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud_ikan $crud_ikan)
    {
        $request -> validate([
            'harga' => 'required',
            'jenis_ikan' => 'required',
            'penjual' => 'required',
            'gambar' => 'required'
        ]);

        $crud_ikan -> update($request -> all());
        //$crud_ikan -> edit = $request -> all();

        return redirect() -> route('crud_ikans.index') -> with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud_ikan  $crud_ikan)
    {
        $crud_ikan -> delete();

        return redirect() -> route('crud_ikans.index') -> with('success', 'Deleted successfully');
    }
}
