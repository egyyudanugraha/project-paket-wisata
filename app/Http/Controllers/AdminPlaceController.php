<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Place;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wisata = Place::latest()->get();
        return view('admin.place.index', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paket = Paket::latest()->get();
        return response()->json($paket);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'paket_id' => 'required'
        ]);

        try{
            // $paket = Paket::create($request->all());
            $place = new Place;
            $place->nama = $request->nama;
            $place->deskripsi = $request->deskripsi;
            $place->paket_id = $request->paket_id;
            $place->save();

            if($place){
                return redirect()->route('place.index')->with('success', 'Wisata berhasil ditambah!');
            }else{
                return redirect()->back()->with('error', 'Terjadi masalah, coba lagi nanti!');
            }
        } catch(QueryException $e) {

    
            if($e->errorInfo[1] == 1062) {
    
                return redirect()->back()->with('error', 'ID Paket sudah ada!');
    
            } else {
                throw $e;
            }
        }
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
        $wisata = Place::with('pakets')->where('id', $id)->get();
        // return response()->json([
        //     'place' => $wisata
        // ]);
        return view('admin.place.detail', compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $place = Place::where('id', $id)->get();
        return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'paket_id' => 'required'
        ]);

        try{
            $place = Place::where('id', $id)->firstOrFail();
            $place->nama = $request->nama;
            $place->deskripsi = $request->deskripsi;
            $place->paket_id = $request->paket_id;
            $place->update();

            if($place){
                return redirect()->route('place.index')->with('success', 'Wisata berhasil diubah!');
            }else{
                return redirect()->back()->with('error', 'Terjadi masalah, coba lagi nanti!');
            }
        } catch(QueryException $e) {

    
            if($e->errorInfo[1] == 1062) {
    
                return redirect()->back()->with('error', 'ID Paket sudah ada!');
    
            } else {
                throw $e;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $place = Place::where('id', $id)->firstOrFail()->delete();
        if($place){
            return redirect()->route('place.index')->with('success', 'Wisata berhasil dihapus!');
        }else{
            return redirect()->back()->with('error', 'Terjadi masalah, coba lagi nanti!');
        }
    }
}
