<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function edit()
    {
        $aboutPage = AboutPage::first();
        if (!$aboutPage) {
            $aboutPage = AboutPage::create([
                'banner_title' => 'About us',
            ]);
        }
        return view('admin.about.edit', compact('aboutPage'));
    }
    
    public function update(Request $request)
    {
        $aboutPage = AboutPage::firstOrFail();
        $validated = $request->validate([
            
            'banner_title' => 'nullable|string|max:255',
            
            'about_label' => 'nullable|string|max:255',
            'about_tagline' => 'nullable|string|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_description_2' => 'nullable|string',
            'about_button_text' => 'nullable|string|max:255',

            
            'technology_label' => 'nullable|string|max:255',
            'technology_title' => 'nullable|string|max:255',
            'technology_description' => 'nullable|string',

            
            'vm_label' => 'nullable|string|max:255',
            'vm_title' => 'nullable|string|max:255',

            'vision_title' => 'nullable|string|max:255',
            'vision_description' => 'nullable|string',

            'values_title' => 'nullable|string|max:255',
            'values_description' => 'nullable|string',

            'mission_title' => 'nullable|string|max:255',

            'quality_label' => 'nullable|string|max:255',
            'quality_title' => 'nullable|string|max:255',
            'quality_description' => 'nullable|string',
            'quality_description_2' => 'nullable|string',

            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string',
            'cta_button_text' => 'nullable|string|max:255',

            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'quality_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);


        if ($request->hasFile('about_image')) {

            $file = $request->file('about_image');

            $filename = 'about-' . time() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images'),
                $filename
            );

            $validated['about_image'] =
                'assets/images/' . $filename;
        }


        if ($request->hasFile('quality_image')) {

            $file = $request->file('quality_image');

            $filename = 'about-quality-' . time() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images'),
                $filename
            );

            $validated['quality_image'] =
                'assets/images/' . $filename;
        }

        $aboutPage->update($validated);

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'About page updated successfully.');
    }
}