<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function edit()
    {
        $homePage = HomePage::first();

        if (!$homePage) {
            $homePage = HomePage::create([
                'about_label' => 'About Us',
                'about_experience' => '16 Years of Industry Experience',
                'about_title' => 'Leading Printing & Labeling Solutions Provider in India',
            ]);
        }

        return view('admin.home.index', compact('homePage'));
    }

    public function update(Request $request)
    {
        $homePage = HomePage::firstOrFail();

        $validated = $request->validate([
            'about_label' => 'nullable|string|max:255',
            'about_experience' => 'nullable|string|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'about_description_2' => 'nullable|string',
            'about_button_text' => 'nullable|string|max:255',

            'quote_title' => 'nullable|string|max:255',
            'quote_button_text' => 'nullable|string|max:255',

            'solutions_subtitle' => 'nullable|string|max:255',
            'solutions_title' => 'nullable|string|max:255',

            'products_label' => 'nullable|string|max:255',
            'products_title' => 'nullable|string|max:255',
            'products_description' => 'nullable|string',

            'location_title' => 'nullable|string|max:255',
            'location_description' => 'nullable|string',
            'location_label' => 'nullable|string|max:255',
            'location_name' => 'nullable|string|max:255',

            'testimonials_title' => 'nullable|string|max:255',
            'testimonials_description' => 'nullable|string',

            'clients_label' => 'nullable|string|max:255',
            'clients_title' => 'nullable|string|max:255',

            'quality_title' => 'nullable|string|max:255',
            'quality_subtitle' => 'nullable|string|max:255',

            'about_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],
            'location_map' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'quality_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,ico,webp',
                'max:2048',
            ],
        ], [
            'about_image.max' => 'Image should be less than 2 MB',
            'location_map.max' => 'Image should be less than 2 MB',
            'quality_image.max' => 'Image should be less than 2 MB'
        ]);
        if ($request->hasFile('about_image')) {

            $file = $request->file('about_image');

            $filename = 'about-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images'),
                $filename
            );

            $validated['about_image'] = 'assets/images/' . $filename;
        }


        if ($request->hasFile('location_map')) {

            $file = $request->file('location_map');

            $filename = 'location-map-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images'),
                $filename
            );

            $validated['location_map'] = 'assets/images/' . $filename;
        }


        if ($request->hasFile('quality_image')) {

            $file = $request->file('quality_image');

            $filename = 'quality-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images'),
                $filename
            );

            $validated['quality_image'] = 'assets/images/' . $filename;
        }

        $homePage->update($validated);

        return redirect()
            ->route('admin.home')
            ->with('success', 'Homepage settings updated successfully.');
    }
}
