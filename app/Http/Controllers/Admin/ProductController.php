<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withCount('galleries')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(15);

        return view('admin.products.index', compact('products'));
    }
    public function products()
    {
        $products = Product::
            orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10);

        return view('frontend.products', compact('products'));
    }
    public function show(request $request)
    {
        $product = Product::with('galleries')
            ->orderBy('sort_order')
            ->where('slug',$request->slug)
            ->where('status',1)
            ->firstOrFail();

        return view('frontend.product', compact('product'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:products,slug',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'final_content'       => 'nullable|string',
            'whatsapp_message'  => 'nullable|string',

            'sort_order'        => 'nullable|integer|min:0',

            'featured'          => 'nullable|boolean',
            'status'            => 'nullable|boolean',

            'gallery'           => 'nullable|array',
            'gallery.*'         => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        DB::transaction(function () use ($request, &$validated) {

            /*
            |--------------------------------------------------------------------------
            | Slug
            |--------------------------------------------------------------------------
            */

            $validated['slug'] = $validated['slug']
                ? Str::slug($validated['slug'])
                : Str::slug($validated['name']);

            $originalSlug = $validated['slug'];
            $counter = 1;

            while (Product::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $originalSlug . '-' . $counter++;
            }


            /*
            |--------------------------------------------------------------------------
            | Main Image
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('image')) {

                $validated['image'] = $this->uploadImage(
                    $request->file('image'),
                    'main'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Checkbox Values
            |--------------------------------------------------------------------------
            */

            $validated['featured'] = $request->boolean('featured');
            $validated['status'] = $request->boolean('status');


            /*
            |--------------------------------------------------------------------------
            | Create Product
            |--------------------------------------------------------------------------
            */

            $product = Product::create($validated);


            /*
            |--------------------------------------------------------------------------
            | Gallery
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('gallery')) {

                foreach ($request->file('gallery') as $index => $file) {

                    ProductGallery::create([
                        'product_id' => $product->id,
                        'image' => $this->uploadImage($file, 'gallery'),
                        'sort_order' => $index,
                    ]);
                }
            }
        });


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $product->load('galleries');

        return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',

            'slug'              => 'nullable|string|max:255|unique:products,slug,' . $product->id,

            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'short_description' => 'nullable|string',
            'description'       => 'nullable|string',
            'final_content'       => 'nullable|string',
            'whatsapp_message'  => 'nullable|string',

            'sort_order'        => 'nullable|integer|min:0',

            'featured'          => 'nullable|boolean',
            'status'            => 'nullable|boolean',

            'gallery'           => 'nullable|array',
            'gallery.*'         => 'image|mimes:jpg,jpeg,png,webp|max:2048',

            'gallery_order'     => 'nullable|array',
            'gallery_order.*'   => 'integer',

            'delete_gallery'    => 'nullable|array',
            'delete_gallery.*'  => 'integer|exists:product_galleries,id',
        ]);


        DB::transaction(function () use ($request, $product, &$validated) {


            $validated['slug'] = $validated['slug']
                ? Str::slug($validated['slug'])
                : Str::slug($validated['name']);

            $originalSlug = $validated['slug'];
            $counter = 1;

            while (
                Product::where('slug', $validated['slug'])
                    ->where('id', '!=', $product->id)
                    ->exists()
            ) {
                $validated['slug'] = $originalSlug . '-' . $counter++;
            }



            if ($request->hasFile('image')) {

                if ($product->image) {

                    $oldImage = public_path($product->image);

                    if (File::exists($oldImage)) {
                        File::delete($oldImage);
                    }
                }

                $validated['image'] = $this->uploadImage(
                    $request->file('image'),
                    'main'
                );
            }



            $validated['featured'] = $request->boolean('featured');
            $validated['status'] = $request->boolean('status');


            $product->update($validated);


            if ($request->filled('delete_gallery')) {

                $galleryIds = $request->input('delete_gallery');

                $galleries = ProductGallery::where('product_id', $product->id)
                    ->whereIn('id', $galleryIds)
                    ->get();

                foreach ($galleries as $gallery) {

                    $this->deleteImage($gallery->image);

                    $gallery->delete();
                }
            }

            if ($request->hasFile('gallery')) {

                $lastSortOrder = ProductGallery::where(
                    'product_id',
                    $product->id
                )->max('sort_order');

                $lastSortOrder = $lastSortOrder ?? -1;

                foreach ($request->file('gallery') as $index => $file) {

                    ProductGallery::create([
                        'product_id' => $product->id,

                        'image' => $this->uploadImage(
                            $file,
                            'gallery'
                        ),

                        'sort_order' => $lastSortOrder + $index + 1,
                    ]);
                }
            }

            if ($request->filled('gallery_order')) {

                foreach ($request->gallery_order as $sortOrder => $galleryId) {

                    ProductGallery::where('id', $galleryId)
                        ->where('product_id', $product->id)
                        ->update([
                            'sort_order' => $sortOrder
                        ]);
                }
            }
        });


        return redirect()
            ->route('admin.products.edit', $product)
            ->with('success', 'Product updated successfully.');
    }
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {


            if ($product->image) {
                $this->deleteImage($product->image);
            }

            $galleries = $product->galleries()->get();

            foreach ($galleries as $gallery) {
                $this->deleteImage($gallery->image);
            }

            $product->delete();
        });


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
    public function destroyGallery(ProductGallery $gallery)
    {
        $this->deleteImage($gallery->image);

        $gallery->delete();

        return back()
            ->with('success', 'Gallery image deleted successfully.');
    }
    private function uploadImage($file, $folder)
    {
        $uploadPath = public_path(
            'assets/images/products/' . $folder
        );

        if (!File::exists($uploadPath)) {
            File::makeDirectory(
                $uploadPath,
                0755,
                true
            );
        }


        $filename =
            time() . '_' .
            uniqid() . '_' .
            Str::slug(
                pathinfo(
                    $file->getClientOriginalName(),
                    PATHINFO_FILENAME
                )
            ) .
            '.' .
            $file->getClientOriginalExtension();


        $file->move(
            $uploadPath,
            $filename
        );


        return 'assets/images/products/' .
            $folder .
            '/' .
            $filename;
    }
    private function deleteImage($image)
    {
        if (!$image) {
            return;
        }

        $path = public_path($image);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}