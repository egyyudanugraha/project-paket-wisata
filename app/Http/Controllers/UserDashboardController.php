<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Paket;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $paket = Paket::with('places')->get();
        return view('user.index', compact('paket'));
    }

    public function riwayat()
    {
        $riwayat = Invoice::with('pakets')->where('user_id', auth()->user()->id)->get();
        return view('user.riwayat', compact('riwayat'));
    }

    public function detail_paket($id)
    {
        $paket = Paket::with('places')->where('id', $id)->get();
        return view('user.detail', compact('paket'));
    }

    public function beli(Request $request)
    {
        $request->validate([
            'inv_name' => 'required',
            'user_id' => 'required',
            'paket_id' => 'required',
            'total' => 'required'
        ]);


        Invoice::create($request->all());
        return redirect('/');
    }
}
