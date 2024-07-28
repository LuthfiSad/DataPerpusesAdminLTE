<?php

namespace App\Http\Controllers;

use App\Models\Perpus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perpuses = Perpus::paginate(10);
        return view('perpuses.index', compact('perpuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('perpuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|string|max:20|unique:perpuses,isbn', // Pastikan ISBN unik di tabel 'buku'
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'year' => 'required|string|max:4', // Misalnya tahun terbit format YYYY
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // dd($request);

        Perpus::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'image' => $imagePath,
            'status' => $request->status,
            'year' => $request->year,
        ]);

        return redirect()->route('perpuses.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Perpus $perpus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perpus $perpus)
    {
        //
        // dd($perpus);
        return view('perpuses.edit', compact('perpus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perpus $perpus)
    {
        //
        $request->validate([
            'isbn' => 'required|string|max:20|unique:perpuses,isbn,' . $perpus->id,
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'year' => 'required|string|max:4',
        ]);

        

        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $perpus->image = $imagePath;
            $perpus->update([
                'image' => $imagePath
            ]);
        }

        $perpus->update([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'status' => $request->status,
            'year' => $request->year,
        ]);

        return redirect()->route('perpuses.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perpus $perpus)
    {
        //
        if ($perpus->image) {
            Storage::delete('public/' . $perpus->image);
        }

        $perpus->delete();

        return redirect()->route('perpuses.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
