<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Pricing;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_registrations' => Registration::count(),
            'new_registrations' => Registration::where('status', 'baru')->count(),
            'total_programs' => Program::count(),
            'total_subjects' => Subject::count(),
            'total_news' => News::count(),
        ];

        $recentRegistrations = Registration::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard.index', compact('stats', 'recentRegistrations'));
    }
}
