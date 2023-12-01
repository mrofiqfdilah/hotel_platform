<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hotel.index')->with([ 'hotel' => Hotel::all(), ]);
    }
    
    public function datakamar(string $id)
    {
        $hotel = Hotel::find($id);
    
        if (!$hotel) {
            return redirect()->route('hotel.index')->with('error', 'Hotel tidak ditemukan.');
        }
    
        // Ambil kamar-kamar (kamars) dari hotel yang dipilih
        $kamars = $hotel->kamars;
    
        return view('datakamar', compact('kamars', 'hotel'));
    }
    



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.create');
    }

   // HotelController.php

public function search(Request $request)
{
    $lokasi = $request->input('lokasi');
    $checkin = $request->input('checkin');
    $checkout = $request->input('checkout');
    $guests = $request->input('guests');

    $hotelQuery = Hotel::query();

    if ($lokasi) {
        $hotelQuery->where('lokasi', 'like', '%' . $lokasi . '%');
    }

    // Tambahkan logika pencarian berdasarkan tanggal checkin, checkout, dan jumlah guests jika diperlukan
    // Misalnya, tambahkan where clause untuk memfilter data berdasarkan tanggal checkin dan checkout
    // Dan tambahkan where clause untuk memfilter data berdasarkan jumlah guests

    $hotel = $hotelQuery->get();

    if ($hotel->isEmpty()) {
        $pesan = "Hotels not found!";
    } else {
        $pesan = null;
    }

    return view('search')->with([
        'hotel' => $hotel,
        'pesan' => $pesan,
    ]);
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namahotel' => 'required',
            'lokasi' => 'required',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() .'_'. $slug;
        $gambar->move('uploads/hotel/', $new_gambar);


        //$eskul itu variable yg ku buat, bukan yg termasuk folder
    $hotel = new Hotel;
    $hotel ->namahotel = $request->namahotel;
    $hotel ->lokasi = $request->lokasi;
    $hotel ->gambar = 'uploads/hotel/'.$new_gambar;
    
    $hotel->save();
    
    //sama kaya redirect/kaya header location kalo berhasil
    return redirect()->route('hotel.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('hotel.edit')->with(['hotel' => Hotel::find($id), ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namahotel' => 'required',
            'lokasi' => 'required',
            'gambar' => 'required|image'
        ]);

        $hotel = Hotel::find($id);

        if (!$hotel) {
            return redirect()->route('hotel.index')->with('error', 'Data hotel not found.');
        }

        try {
            if ($request->hasFile('gambar')) {
                $gambar = $request->gambar;
                $slug = Str::slug($gambar->getClientOriginalName());
                $new_gambar = time() . '_' . $slug;
                $gambar->move('uploads/hotel/', $new_gambar);
                File::delete($hotel->gambar); // Delete the old image
                $hotel->gambar = 'uploads/hotel/' . $new_gambar;
            }

            // Update the hotel data
            $hotel->namahotel = $request->namahotel;
            $hotel->lokasi = $request->lokasi;
            $hotel->save();

            return redirect()->route('hotel.index')->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            // Log any errors that occur during the update process
            Log::error('Error updating hotel data: ' . $e->getMessage());

            return redirect()->route('hotel.edit', $id)->with('error', 'Error updating hotel data. Please try again.');
        }
    }
    public function showHotelWithKamarCount()
{
    $hotels = Hotel::withCount('kamars')->get();
    return view('hotel.index', compact('hotels'));
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return redirect()->route('hotel.index')->with('error', 'Data buku not found.');
        }
    
        // Delete the book image from the storage
        File::delete($hotel->gambar);
    
        // Delete the book record from the database
        $hotel->delete();
    
        return redirect()->route('hotel.index')->with('success', 'Data Berhasil Dihapus');
    }
}
