<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::latest()->get();

        return view('biodata.index', compact('biodatas'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'pendidikan' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('foto-profil', 'public');
        }

        Biodata::create($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil ditambahkan!');
    }

    public function show(Biodata $biodatum)
    {
        return view('biodata.show', [
            'biodata' => $biodatum
        ]);
    }

    public function edit(Biodata $biodatum)
    {
        return view('biodata.edit', [
            'biodata' => $biodatum
        ]);
    }

    public function update(Request $request, Biodata $biodatum)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'pendidikan' => 'required|string',
            'deskripsi' => 'required|string',
            'pengalaman' => 'nullable|string',
            'tujuan_karier' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoLama = $biodatum->foto;

            $data['foto'] = $request->file('foto')
                ->store('foto-profil', 'public');

            if ($fotoLama) {
                Storage::disk('public')->delete($fotoLama);
            }
        }

        $biodatum->update($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil diperbarui!');
    }

    public function destroy(Biodata $biodatum)
    {
        if ($biodatum->foto) {
            Storage::disk('public')->delete($biodatum->foto);
        }

        $biodatum->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil dihapus!');
    }
}
