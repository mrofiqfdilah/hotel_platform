<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\kamar;
 use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\hotel;
class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kamar.index')->with([ 'kamar' => Kamar::all(), ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();
        return view('kamar.create', compact('hotels'));
    }
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required' ,// Pastikan hotel_id telah diberikan dan ada di tabel hotels.
            'namakamar' =>'required',
            'harga' =>'required',
            'kapasitas' =>'required',
            'fasilitas' =>'required',
            'gambar' => 'required|image|max:2040',
           
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() .'_'. $slug;
        $gambar->move('uploads/kamar/', $new_gambar);


        //$eskul itu variable yg ku buat, bukan yg termasuk folder
        $kamar = new Kamar;
        $kamar->hotel_id = $request->hotel_id; // Assign hotel_id yang dipilih.
        $kamar->namakamar = $request->namakamar;
        $kamar->harga = $request->harga;
        $kamar->kapasitas = $request->kapasitas;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->gambar = 'uploads/kamar/' . $new_gambar;
        $kamar->save();
    
    //sama kaya redirect/kaya header location kalo berhasil
    return redirect()->route('kamar.index')->with('success', 'Data Berhasil Ditambah');
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
        return view('kamar.edit')->with(['kamar' => Kamar::find($id), ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namakamar' =>'required',
            'harga' =>'required',
            'kapasitas' =>'required',
            'fasilitas' =>'required',
            'gambar' => 'required|image|max:2040',
            'nokamar' => 'required',
        ]);

        $kamar = Kamar::find($id);

        if (!$kamar) {
            return redirect()->route('kamar.index')->with('error', 'Data hotel not found.');
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->gambar;
            $slug = Str::slug($gambar->getClientOriginalName());
            $new_gambar = time() . '_' . $slug;
            $gambar->move('uploads/kamar/', $new_gambar);
            File::delete($kamar->gambar); // Delete the old image
            $kamar->gambar = 'uploads/kamar/' . $new_gambar;
        }
    
        // Update the book data
        $kamar->namakamar = $request->namakamar;
        $kamar->harga = $request->harga;
        $kamar->kapasitas = $request->kapasitas;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->save();
        
    
        return redirect()->route('kamar.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::find($id);

        if (!$kamar) {
            return redirect()->route('kamar.index')->with('error', 'Data buku not found.');
        }
    
        // Delete the book image from the storage
        File::delete($kamar->gambar);
    
        // Delete the book record from the database
        $kamar->delete();
    
        return redirect()->route('kamar.index')->with('success', 'Data Berhasil Dihapus');
    }
}
