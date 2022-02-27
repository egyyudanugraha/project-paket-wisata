<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Paket;
use App\Models\Place;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pakets = Paket::with('places')->with('invoices')->get();
        $places = count(Place::all());
        $invoices = count(Invoice::all());

        // return response()->json([
        //     'pakets' => $pakets,
        //     'places' => $places, 
        //     'invoices' => $invoices
        // ]);
        return view('admin.index', compact('pakets', 'places', 'invoices'));
    }
}
