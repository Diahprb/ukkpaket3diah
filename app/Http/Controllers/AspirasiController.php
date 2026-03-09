<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AspirasiController extends Controller
{

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


    public function create()
    {
        $kategoris = Kategori::all();
        return view('aspirasi.create', compact('kategoris'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'judul' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
            'tanggal' => ['date'],
        ]);

        if ($request->bukti_lapor) {
            $path = $request->file('bukti_lapor')->store('bukti_lapor', 'public');
            $validated['bukti_lapor'] = $path;
        }

        $aspirasi = Aspirasi::create([
            'siswa_id' => Auth::guard('siswa')->id(),
            'kategori_id' => $validated['kategori_id'],
            'judul' => $validated['judul'],
            'tanggal' => $validated['tanggal'],
            'keterangan' => $validated['keterangan'],
            'bukti_lapor' => $validated['bukti_lapor'] ?? null,
        ]);



        $admin = \App\Models\User::all();
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

    public function show(Aspirasi $aspirasi)
    {
        // ensure the authenticated user owns the aspirasi
        if ($aspirasi->siswa_id !== Auth::guard('siswa')->id()) {
            abort(403);
        }

        return view('aspirasi.show', compact('aspirasi'));
    }

    public function edit(Aspirasi $aspirasi)
    {
        if ($aspirasi->siswa_id !== Auth::guard('siswa')->id()) {
            abort(403);
        }

        $kategoris = Kategori::all();
        return view('aspirasi.edit', compact('aspirasi', 'kategoris'));
    }

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

    public function feedback()
    {
        $aspirasis = Auth::guard('siswa')
            ->user()
            ->aspirasis()
            ->whereNotNull('feedback')
            ->latest()
            ->paginate(10);

        return view('aspirasi.feedback', compact('aspirasis'));
    }

    public function feedbackShow(Aspirasi $aspirasi)
    {
        if ($aspirasi->siswa_id !== Auth::guard('siswa')->id()) {
            abort(403);
        }

        return view('aspirasi.feedback-show', compact('aspirasi'));
    }
}
