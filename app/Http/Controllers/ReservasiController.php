<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservasi;
use App\Models\hotel;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reservasi.index')->with([ 'reservasi' => Reservasi::all(), ]);
    }

    public function pesan(Request $request, $namakamar = null, $namahotel = null)
    {
        if ($namakamar && $namahotel) {
            $kamar = Kamar::where('namakamar', $namakamar)
                          ->whereHas('hotel', function ($query) use ($namahotel) {
                              $query->where('namahotel', $namahotel);
                          })
                          ->first();
    
            // Check if the room exists
            if (!$kamar) {
                return redirect()->route('reservasi.index')->with('error', 'Kamar not found in the specified hotel.');
            }
    
            // Fetch the associated hotel using the 'namahotel' parameter
            $hotel = Hotel::where('namahotel', $namahotel)->first();
    
            // Check if the hotel exists
            if (!$hotel) {
                return redirect()->route('reservasi.index')->with('error', 'Hotel not found.');
            }
    
            return view('pesan', compact('namakamar', 'namahotel', 'kamar', 'hotel'));
        }
    
        // Handle invalid request
        return redirect()->route('reservasi.index')->with('error', 'Invalid request.');
    }
    


   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'namapemesan' => 'required',
         'checkin' => 'required',
         'checkout' => 'required',
         'notelpon' => 'required',
        ]);

        $reservasi = new Reservasi;
        $reservasi->namapemesan = Auth::user()->name;
        $reservasi->namapemesan= $request->namapemesan;
        $reservasi->checkin = $request->checkin;
        $reservasi->checkout = $request->checkout;
        $reservasi->notelpon = $request->notelpon;
        $reservasi->user_id = Auth::user()->id;
        $reservasi->kamar_id = $request->kamar_id;
        $reservasi->hotel_id = $request->hotel_id;
        $reservasi->save();

        return redirect()->route('reservasi.index')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('reservasi.edit')->with(['reservasi' => Reservasi::find($id), ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namapemesan' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'notelpon' => 'required',
           ]);
   
           $reservasi =  Reservasi::find($id);
           $reservasi->namapemesan = $request->namapemesan;
           $reservasi->checkin = $request->checkin;
           $reservasi->checkout = $request->checkout;
           $reservasi->notelpon = $request->notelpon;
           $reservasi->save();
   
           return redirect()->route('reservasi.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->delete();

        return back()->with('success', 'data berhasil dihapus');
    }

}
