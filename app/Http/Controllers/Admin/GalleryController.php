<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order')
            ->latest()
            ->get();
        return view('admin.galleries.index', compact('galleries'));
    }
    public function gallery(){
        $galleries = Gallery::where('status',1)->orderBy('sort_order')->paginate(40);
        return view('frontend.gallery',compact('galleries'));
    }
    public function create()
    {
        return view('admin.galleries.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'required|in:printing,labels,industrial,products',
            'image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $data = $request->only([
            'title',
            'category',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');


        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/gallery'),
                $filename
            );

            $data['image'] = 'assets/images/gallery/' . $filename;
        }


        Gallery::create($data);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery image added successfully.');
    }


    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }


    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'required|in:printing,labels,industrial,products',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order' => 'nullable|integer|min:0',
            'status'     => 'nullable|boolean',
        ]);

        $data = $request->only([
            'title',
            'category',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');


        if ($request->hasFile('image')) {

            if (
                $gallery->image &&
                File::exists(public_path($gallery->image))
            ) {
                File::delete(public_path($gallery->image));
            }


            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/gallery'),
                $filename
            );

            $data['image'] = 'assets/images/gallery/' . $filename;
        }


        $gallery->update($data);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }


    public function destroy(Gallery $gallery)
    {
        if (
            $gallery->image &&
            File::exists(public_path($gallery->image))
        ) {
            File::delete(public_path($gallery->image));
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery deleted successfully.');
    }
}