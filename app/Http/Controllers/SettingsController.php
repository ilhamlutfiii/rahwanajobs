<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'homepage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'whatsapp' => 'nullable|string|regex:/^\+?[0-9]{10,15}$/',
            'twitter' => 'url',
            'facebook' => 'url',
            'instagram' => 'url',
        ]);

        $setting = new Setting();

        if ($request->hasFile('logo')) {
            $setting->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('homepage')) {
            $setting->homepage = $request->file('homepage')->store('homepages', 'public');
        }

        $setting->whatsapp = $request->whatsapp;
        $setting->twitter = $request->twitter;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;

        $setting->save();

        return redirect()->back()->with('success', 'Setting berhasil ditambahkan!');
    }

    public function show()
    {
        $setting = Setting::first();
        return view('admin.settings.show', compact('setting'));
    }

    public function edit()
    {
        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'homepage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp' => 'nullable|string|regex:/^\+?[0-9]{10,15}$/',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $setting->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('homepage')) {
            if ($setting->homepage) {
                Storage::disk('public')->delete($setting->homepage);
            }
            $setting->homepage = $request->file('homepage')->store('homepages', 'public');
        }

        $setting->whatsapp = $request->input('whatsapp');
        $setting->twitter = $request->input('twitter');
        $setting->facebook = $request->input('facebook');
        $setting->instagram = $request->input('instagram');

        $setting->save();

        return redirect()->back()->with('success', 'Setting berhasil diperbarui!');
    }
}
