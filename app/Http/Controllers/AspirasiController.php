<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AspirasiController extends Controller
{
    /**
     * Show list of aspirasi submitted by the authenticated student.
     */
    public function index()
    {
        // paginate to prevent heavy load, 10 items per page
        $aspirasis = Auth::guard('siswa')
            ->user()
            ->aspirasis()
            ->latest()
            ->paginate(10);

        return view('aspirasi.index', compact('aspirasis'));
    }

    /**
     * Display the form to create a new aspirasi.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('aspirasi.create', compact('kategoris'));
    }

    /**
     * Store a newly created aspirasi in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'judul' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
        ]);


        $aspirasi = Aspirasi::create([
            'siswa_id' => Auth::guard('siswa')->id(),
            'kategori_id' => $validated['kategori_id'],
            'judul' => $validated['judul'],
            'keterangan' => $validated['keterangan'],
        ]);


        $admin = \App\Models\Admin::all();
        foreach ($admin as $value) {
                Notification::make()
                    ->title('Aspirasi Baru!')
                    ->body('Ada aspirasi baru dari siswa.')
                    ->actions([
                        Action::make('view')
                            ->label('Lihat Aspirasi')
                            ->url(fn() => route('filament.admin.resources.aspirasis.view', ['record' => $aspirasi->id]), true)
                    ])
                    ->sendToDatabase($value);
        }

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dikirim.');
    }

    /**
     * Display a single aspirasi.
     */
    public function show(Aspirasi $aspirasi)
    {
        // ensure the authenticated user owns the aspirasi
        if ($aspirasi->user_id !== Auth::id()) {
            abort(403);
        }

        return view('aspirasi.show', compact('aspirasi'));
    }

    /**
     * Show form for editing an aspirasi.
     */
    public function edit(Aspirasi $aspirasi)
    {
        if ($aspirasi->siswa_id !== Auth::guard('siswa')->id()) {
            abort(403);
        }

        $kategoris = Kategori::all();
        return view('aspirasi.edit', compact('aspirasi', 'kategoris'));
    }

    /**
     * Update the specified aspirasi in storage.
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        if ($aspirasi->siswa_id !== Auth::guard('siswa')->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'judul' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
        ]);

        $aspirasi->update($validated);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil diperbarui.');
    }

    /**
     * Remove the specified aspirasi from storage.
     */
    public function destroy(Aspirasi $aspirasi)
    {
        if ($aspirasi->siswa_id !== Auth::guard('siswa')->id()) {
            abort(403);
        }

        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
    }

    public function histori(Request $request)
    {
        $aspirasis = Auth::guard('siswa')
            ->user()
            ->aspirasis()
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest()
            ->paginate(10);

        return view('aspirasi.histori', compact('aspirasis'));
    }
}
