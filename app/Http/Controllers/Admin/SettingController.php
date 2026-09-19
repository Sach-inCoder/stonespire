<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function __construct(
        protected SettingService $settingService
    ) {}
    public function index()
    {
        $settings = Setting::pluck('value', 'key');

        return view('admin.settings.index', compact('settings'));
    }


    public function update(Request $request)
    {
        $validated = $request->validate([

            'website_name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'alternate_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'alternate_email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'whatsapp' => [
                'nullable',
                'string',
                'max:30',
            ],

            'facebook' => [
                'nullable',
                'url',
                'max:255',
            ],

            'instagram' => [
                'nullable',
                'url',
                'max:255',
            ],

            'linkedin' => [
                'nullable',
                'url',
                'max:255',
            ],

            'youtube' => [
                'nullable',
                'url',
                'max:255',
            ],

            'copyright' => [
                'nullable',
                'string',
                'max:255',
            ],
            'google_map' => [
                'nullable',
                'string'
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'favicon' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,ico,webp',
                'max:1024',
            ],

        ]);

        $textSettings = [
            'website_name',
            'phone',
            'alternate_phone',
            'email',
            'alternate_email',
            'address',
            'whatsapp',
            'facebook',
            'instagram',
            'linkedin',
            'youtube',
            'copyright',
            'google_map',
        ];


        foreach ($textSettings as $key) {

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $validated[$key] ?? null]
            );
        }

        if ($request->hasFile('logo')) {

            $oldLogo = Setting::where('key', 'logo')->value('value');

            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }

            $logo = $request->file('logo')
                ->store('settings', 'public');

            Setting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $logo]
            );
        }

        if ($request->hasFile('favicon')) {

            $oldFavicon = Setting::where('key', 'favicon')->value('value');

            if ($oldFavicon) {
                Storage::disk('public')->delete($oldFavicon);
            }

            $favicon = $request->file('favicon')
                ->store('settings', 'public');

            Setting::updateOrCreate(
                ['key' => 'favicon'],
                ['value' => $favicon]
            );
        }


        return back()->with(
            'success',
            'Website settings updated successfully.'
        );
    }
}
