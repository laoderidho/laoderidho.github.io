<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $perusahaan = Perusahaan::latest()->get();
        return view('perusahaan.index', compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData =$request->validate([
            'nama_perusahaan' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'ket_perusahaan' => 'required',
            'syarat' => 'required',
            'akreditasi' => 'required',
            'logo' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required'
        ]);
        $perusahaan = Perusahaan::create([
            'nama_perusahaan'=>$request->input('nama_perusahaan'),
            'email'=>$request->input('email'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'ket_perusahaan'=>$request->input('ket_perusahaan'),
            'syarat'=>$request->input('syarat'),
            'akreditasi'=>$request->input('akreditasi'),
            'logo' => $request->file('logo')->store('post-images'),
            'alamat'=>$request->input('alamat'),
            'deskripsi'=>$request->input('deskripsi')
        ]);
        
       
         
        // post::create($validateData);
        return redirect('/perusahaan')->with('succes','perusahaan Telah di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $validateData =$request->validate([
            'nama_perusahaan' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'ket_perusahaan' => 'required',
            'syarat' => 'required',
            'akreditasi' => 'required',
            'logo' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required'
        ]);
        $perusahaan = Perusahaan::whereId($perusahaan->id)->update([
            'nama_perusahaan'=>$request->input('nama_perusahaan'),
            'email'=>$request->input('email'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'ket_perusahaan'=>$request->input('ket_perusahaan'),
            'syarat'=>$request->input('syarat'),
            'akreditasi'=>$request->input('akreditasi'),
            'logo' => $request->file('logo')->store('post-images'),
            'alamat'=>$request->input('alamat'),
            'deskripsi'=>$request->input('deskripsi'),
        ]);

            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
      
        return redirect('/perusahaan')->with('succes','perusahaan Telah di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $perusahaan)
    {
        if($perusahaan->logo){
            Storage::delete($perusahaan->logo);
        }
        $perusahaan = Perusahaan::find($perusahaan->id);
        $perusahaan->delete();

        return redirect('/perusahaan')->with('succes','perusahaan Telah di Hapus!');
    }
}
