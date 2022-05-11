<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $lamaran = Lamaran::latest()->get();
            return view('lamaran.index', compact('lamaran'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lamaran.create',[
            'perusahaans'=>Perusahaan::get(),
            'users'=>User::get()
        ]);
      
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
            'user_id' => 'required',
            'perusahaan_id' => 'required',
            'ktp' => 'required',
            'cv' => 'required',
            'surat_lamaran' => 'required',
            'ijazah' => 'required',
            'prestasi' => 'required',
            'pengalaman' => 'required',
        ]);
        $lamaran = Lamaran::create([
            'user_id' => $request->input('user_id'),
            'perusahaan_id' => $request->input('perusahaan_id'),
            'ktp' => $request->file('ktp')->store('doc'),
            'cv' => $request->file('cv')->store('doc'),
            'surat_lamaran' => $request->file('surat_lamaran')->store('doc'),
            'ijazah' => $request->file('ijazah')->store('doc'),
            'prestasi' => $request->file('prestasi')->store('doc'),
            'pengalaman' => $request->input('pengalaman'),
            'status_penerimaan' => $request->input('status_penerimaan')
            ]);
            return redirect('/lamaran');
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
    public function edit(Lamaran $lamaran)
    {
        
        $users = User::get();
        return view('lamaran.edit', compact('lamaran', 'users'));

        // $perusahaans = Perusahaan::get();
        // return view('lamaran.edit', compact('lamaran', 'perusahaans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lamaran $lamaran)
    {
        $lamaran = Lamaran::whereId($lamaran->id)->update([
            'user_id' => $request->input('user_id'),
            'perusahaan_id' => $request->input('perusahaan_id'),
            'ktp' => $request->file('ktp')->store('doc'),
            'cv' => $request->file('cv')->store('doc'),
            'surat_lamaran' => $request->file('surat_lamaran')->store('doc'),
            'ijazah' => $request->file('ijazah')->store('doc'),
            'prestasi' => $request->file('prestasi')->store('doc'),
            'pengalaman' => $request->input('pengalaman'),
            'status_penerimaan' => $request->input('status_penerimaan')
            ]);
            return redirect('/lamaran');

            if($request->olddoc){
                Storage::delete($request->olddoc);
            }
            if($request->olddoc1){
                Storage::delete($request->olddoc1);
            }
            if($request->olddoc2){
                Storage::delete($request->olddoc2);
            }
            if($request->olddoc3){
                Storage::delete($request->olddoc3);
            }
            if($request->olddoc4){
                Storage::delete($request->olddoc4);
            }
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lamaran $lamaran)
    {
        if($lamaran->ktp){
            Storage::delete($lamaran->ktp);
        }
        if($lamaran->cv){
            Storage::delete($lamaran->cv);
        }
        if($lamaran->surat_lamaran){
            Storage::delete($lamaran->surat_lamaran);
        }
        if($lamaran->ijazah){
            Storage::delete($lamaran->ijazah);
        }
        if($lamaran->prestasi){
            Storage::delete($lamaran->prestasi);
        }
        $lamaran = Lamaran::find($lamaran->id);
        $lamaran->delete();
        return redirect('/lamaran');
    }
}
