<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\News;
use App\Models\Pricing;
use App\Models\Program;
use App\Models\Registration;
use App\Models\SiteSetting;
use App\Models\Subject;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->all();

        $advantages = Advantage::where('is_active', true)->orderBy('order', 'asc')->get();
        $programs = Program::where('is_active', true)->orderBy('order', 'asc')->get();
        $subjects = Subject::where('is_active', true)->orderBy('order', 'asc')->get();

        $pricingsKursus = Pricing::where('type', 'kursus')->where('is_active', true)->orderBy('order', 'asc')->get();
        $pricingsPrivat = Pricing::where('type', 'privat')->where('is_active', true)->orderBy('order', 'asc')->get();

        $newsList = News::where('is_published', true)->orderBy('published_at', 'desc')->take(3)->get();

        return view('landing.index', compact(
            'settings',
            'advantages',
            'programs',
            'subjects',
            'pricingsKursus',
            'pricingsPrivat',
            'newsList'
        ));
    }

    public function storeRegistration(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:50',
            'education_level' => 'required|string|max:50',
            'program_type' => 'required|string|max:50',
            'selected_subjects' => 'nullable|array',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $subjectsString = isset($validated['selected_subjects'])
            ? implode(', ', $validated['selected_subjects'])
            : null;

        $registration = Registration::create([
            'student_name' => $validated['student_name'],
            'parent_name' => $validated['parent_name'],
            'phone_number' => $validated['phone_number'],
            'education_level' => $validated['education_level'],
            'program_type' => $validated['program_type'],
            'selected_subjects' => $subjectsString,
            'address' => $validated['address'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'status' => 'baru',
        ]);

        // Formulate WhatsApp Redirect Text
        $adminPhone = SiteSetting::getByKey('contact_phone', '081272218275');
        // Clean phone number for WhatsApp link
        $formattedPhone = preg_replace('/[^0-9]/', '', $adminPhone);
        if (str_starts_with($formattedPhone, '0')) {
            $formattedPhone = '62' . substr($formattedPhone, 1);
        }

        $waText = "*PENDAFTARAN BARU ROBBANI KURSUS & PRIVAT*\n\n"
            . "• *Nama Siswa:* " . $registration->student_name . "\n"
            . "• *Nama Orang Tua/Wali:* " . $registration->parent_name . "\n"
            . "• *No. HP/WA:* " . $registration->phone_number . "\n"
            . "• *Jenjang:* " . $registration->education_level . "\n"
            . "• *Tipe Program:* " . $registration->program_type . "\n"
            . ($subjectsString ? "• *Mata Pelajaran:* " . $subjectsString . "\n" : "")
            . ($registration->address ? "• *Alamat:* " . $registration->address . "\n" : "")
            . ($registration->notes ? "• *Catatan:* " . $registration->notes . "\n" : "")
            . "\nSaya ingin mengonfirmasi pendaftaran ini. Terima kasih!";

        $waUrl = "https://wa.me/" . $formattedPhone . "?text=" . urlencode($waText);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil dikirim! Silakan selesaikan konfirmasi di WhatsApp.',
                'wa_url' => $waUrl
            ]);
        }

        return redirect()->away($waUrl);
    }
}
