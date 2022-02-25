<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::get();
        return view('admin.paket.index', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required'
        ]);
        try{
            // $paket = Paket::create($request->all());
            $paket = new Paket;
            $paket->nama = $request->nama;
            $paket->harga = intval($request->harga);
            $paket->save();

            if($paket){
                return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambah!');
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
        $paket = Paket::with('places')->where('id', $id)->get();
        // return response()->json($paket);
        return view('admin.paket.detail', compact('paket'));
        
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
        $paket = Paket::where('id', $id)->get();
        return response()->json($paket);
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
            'harga' => 'required'
        ]);
        
        try{
            
            $paket = Paket::where('id', $id)->firstOrFail();
            $paket->nama = $request->nama;
            $paket->harga = intval($request->harga);
            $paket->update();
            
            if($paket){
                return redirect()->route('paket.index')->with('success', 'Paket berhasil diedit!');
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
        $paket = Paket::where('id', $id)->firstOrFail()->delete();
        if($paket){
            return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus!');
        }else{
            return redirect()->back()->with('error', 'Terjadi masalah, coba lagi nanti!');
        }
    }
}
