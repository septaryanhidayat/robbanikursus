<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::orderBy('type', 'asc')->orderBy('order', 'asc')->get();
        return view('admin.pricings.index', compact('pricings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:kursus,privat',
            'level' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'period' => 'required|string|max:100',
            'notes' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Pricing::create($validated);

        return back()->with('success', 'Rincian biaya berhasil ditambahkan.');
    }

    public function update(Request $request, Pricing $pricing)
    {
        $validated = $request->validate([
            'type' => 'required|in:kursus,privat',
            'level' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'period' => 'required|string|max:100',
            'notes' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $pricing->update($validated);

        return back()->with('success', 'Rincian biaya berhasil diperbarui.');
    }

    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        return back()->with('success', 'Rincian biaya berhasil dihapus.');
    }
}
