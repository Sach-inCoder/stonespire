<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message'     => 'required|string',
            'rating'      => 'required|numeric|min:1|max:5',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'designation',
            'message',
            'rating',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/testimonials'),
                $filename
            );

            $data['image'] = 'assets/images/testimonials/' . $filename;
        }

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message'     => 'required|string',
            'rating'      => 'required|numeric|min:1|max:5',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'designation',
            'message',
            'rating',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {

            if (
                $testimonial->image &&
                File::exists(public_path($testimonial->image))
            ) {
                File::delete(public_path($testimonial->image));
            }

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/testimonials'),
                $filename
            );

            $data['image'] = 'assets/images/testimonials/' . $filename;
        }

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if (
            $testimonial->image &&
            File::exists(public_path($testimonial->image))
        ) {
            File::delete(public_path($testimonial->image));
        }

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}