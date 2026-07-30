<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::orderBy('order', 'asc')->get();
        return view('admin.advantages.index', compact('advantages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Advantage::create($validated);

        return back()->with('success', 'Keunggulan berhasil ditambahkan.');
    }

    public function update(Request $request, Advantage $advantage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $advantage->update($validated);

        return back()->with('success', 'Keunggulan berhasil diperbarui.');
    }

    public function destroy(Advantage $advantage)
    {
        $advantage->delete();
        return back()->with('success', 'Keunggulan berhasil dihapus.');
    }
}
