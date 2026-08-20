@props(['class' => 'h-10 w-auto', 'alt' => 'Robbani Kursus & Privat'])

@php
    $logoPath = \App\Models\SiteSetting::getByKey('site_logo', 'images/logo.jpg');
    
    // Clean path for file_exists check
    $relativeCleanPath = ltrim(str_replace('\\', '/', $logoPath), '/');
    $hasCustomLogo = !empty($logoPath) && file_exists(public_path($relativeCleanPath));
    $logoUrl = $hasCustomLogo ? asset($relativeCleanPath) : asset('images/logo.jpg');
@endphp

<img src="{{ $logoUrl }}" alt="{{ $alt }}" class="{{ $class }} object-contain block">
