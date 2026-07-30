<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $inputs = $request->except('_token');

        // Handle file uploads (e.g. site_logo)
        if ($request->hasFile('site_logo')) {
            $path = $request->file('site_logo')->store('settings', 'public');
            SiteSetting::setByKey('site_logo', 'storage/' . $path);
            unset($inputs['site_logo']);
        }

        foreach ($inputs as $key => $value) {
            SiteSetting::setByKey($key, $value);
        }

        return back()->with('success', 'Pengaturan situs & logo berhasil disimpan.');
    }
}
