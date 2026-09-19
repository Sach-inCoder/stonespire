<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order')->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'button_text' => 'nullable|string|max:100',
            'button_url'  => 'nullable|string|max:500',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'title',
            'subtitle',
            'description',
            'button_text',
            'button_url',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/sliders'),
                $filename
            );

            $data['image'] = 'assets/images/sliders/' . $filename;
        }

        Slider::create($data);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider added successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'button_text' => 'nullable|string|max:100',
            'button_url'  => 'nullable|string|max:500',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'title',
            'subtitle',
            'description',
            'button_text',
            'button_url',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {

            if (
                $slider->image &&
                File::exists(public_path($slider->image))
            ) {
                File::delete(public_path($slider->image));
            }

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/sliders'),
                $filename
            );

            $data['image'] = 'assets/images/sliders/' . $filename;
        }

        $slider->update($data);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if (
            $slider->image &&
            File::exists(public_path($slider->image))
        ) {
            File::delete(public_path($slider->image));
        }

        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}