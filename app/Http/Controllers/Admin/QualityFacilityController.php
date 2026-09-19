<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QualityFacilityController extends Controller
{
    public function index()
    {
        $facilities = QualityFacility::orderBy('sort_order')->get();

        return view('admin.quality-facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.quality-facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'description',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/quality'),
                $filename
            );

            $data['image'] = 'assets/images/quality/' . $filename;
        }

        QualityFacility::create($data);

        return redirect()
            ->route('admin.quality-facilities.index')
            ->with('success', 'Quality facility added successfully.');
    }

    public function edit(QualityFacility $qualityFacility)
    {
        return view(
            'admin.quality-facilities.edit',
            compact('qualityFacility')
        );
    }

    public function update(
        Request $request,
        QualityFacility $qualityFacility
    ) {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'description',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {

            if (
                $qualityFacility->image &&
                File::exists(public_path($qualityFacility->image))
            ) {
                File::delete(public_path($qualityFacility->image));
            }

            $file = $request->file('image');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/quality'),
                $filename
            );

            $data['image'] = 'assets/images/quality/' . $filename;
        }

        $qualityFacility->update($data);

        return redirect()
            ->route('admin.quality-facilities.index')
            ->with('success', 'Quality facility updated successfully.');
    }

    public function destroy(QualityFacility $qualityFacility)
    {
        if (
            $qualityFacility->image &&
            File::exists(public_path($qualityFacility->image))
        ) {
            File::delete(public_path($qualityFacility->image));
        }

        $qualityFacility->delete();

        return redirect()
            ->route('admin.quality-facilities.index')
            ->with('success', 'Quality facility deleted successfully.');
    }
}
