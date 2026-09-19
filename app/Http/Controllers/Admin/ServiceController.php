<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::with('tags')
            ->orderBy('sort_order')
            ->paginate(10);
        return View('admin.services.index',compact('services'));
    }
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'icon'        => ['nullable', 'string', 'max:255'],
            'image'       => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'status'      => ['nullable', 'boolean'],
            'tags'        => ['nullable', 'array'],
            'tags.*'      => ['nullable', 'string', 'max:100'],
        ]);
        DB::transaction(function () use ($request, $validated) {
            
            $slug = Str::slug($request->name);
            $orignalSlug = $slug;
            $count = 1;
            while (Service::where('slug', $slug)->exists()) {
                $slug = $orignalSlug . '-' . $count++;
            }
            $imagePath = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move(
                    public_path('assets/images/services'),
                    $filename
                );

                $imagePath = 'assets/images/services/' . $filename;
            }

            $service = Service::create([
                'name'              => $validated['name'],
                'short_description' => $validated['short_description'],
                'description'       => $validated['description'],
                'icon'              => $validated['icon'] ?? null,
                'image'             => $imagePath,
                'sort_order'        => $validated['sort_order'] ?? 0,
                'status'            => $request->boolean('status'),
                'slug'              => $slug
            ]);

            $tags = collect($validated['tags'] ?? [])
                ->filter(fn ($tag) => filled($tag));

            foreach ($tags as $tag) {
                $service->tags()->create([
                    'name' => trim($tag),
                ]);
            }
        });

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $service->load('tags');

        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'icon'        => ['nullable', 'string', 'max:255'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'status'      => ['nullable', 'boolean'],
            'tags'        => ['nullable', 'array'],
            'tags.*'      => ['nullable', 'string', 'max:100'],
        ]);

        DB::transaction(function () use ($request, $validated, $service) {

            $data = [
                'name'       => $validated['name'],
                'short_description' => $validated['short_description'],
                'description' => $validated['description'],
                'icon'        => $validated['icon'] ?? null,
                'sort_order'  => $validated['sort_order'] ?? 0,
                'status'      => $request->boolean('status'),
            ];

            if ($request->hasFile('image')) {

                if (
                    $service->image &&
                    File::exists(public_path($service->image))
                ) {
                    File::delete(public_path($service->image));
                }

                $image = $request->file('image');

                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move(
                    public_path('assets/images/services'),
                    $filename
                );

                $data['image'] = 'assets/images/services/' . $filename;
            }

            $service->update($data);
            $service->tags()->delete();

            $tags = collect($validated['tags'] ?? [])
                ->filter(fn ($tag) => filled($tag));

            foreach ($tags as $tag) {
                $service->tags()->create([
                    'name' => trim($tag),
                    'slug' => Str::slug($tag),
                ]);
            }
        });

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        DB::transaction(function () use ($service) {

            if (
                $service->image &&
                File::exists(public_path($service->image))
            ) {
                File::delete(public_path($service->image));
            }

            $service->tags()->delete();
            $service->delete();
        });

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
    public function services() {
        $services = Service::with('tags')->where('status',1)->orderBy('sort_order')->paginate(10);
        return View('frontend.services',compact('services'));
    }
}
