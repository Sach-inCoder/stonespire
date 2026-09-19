<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(15);

        return view('admin.blogs.index', compact('blogs'));
    }
    public function blogs()
    {
        $blogs = Blog::where('status',1)->orderByDesc('published_at')->paginate(12);
        return view('frontend.blogs',compact('blogs'));
    }
    public function show(request $request)
    {
        $blog = Blog::where('status',1)->where('slug',$request->slug)->firstOrFail();
        $recentBlogs = Blog::where('status', true)
        ->where('id', '!=', $blog->id)
        ->where(function ($query) {
            $query->whereNull('published_at')
                  ->orWhereDate('published_at', '<=', now());
        })
        ->orderByDesc('published_at')
        ->take(2)
        ->get();
        return view('frontend.blog',compact('blog','recentBlogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:blogs,slug',

            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'category'          => 'nullable|string|max:100',

            'short_description' => 'nullable|string',
            'content'           => 'required|string',

            'author'            => 'nullable|string|max:255',

            'quote'             => 'nullable|string|max:1000',
            'quote_author'      => 'nullable|string|max:255',

            'read_time'         => 'nullable|integer|min:1',

            'sort_order'        => 'nullable|integer|min:0',

            'published_at'      => 'nullable|date',

            'featured'          => 'nullable|boolean',
            'status'            => 'nullable|boolean',
        ]);


        $validated['slug'] = $validated['slug']
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $originalSlug = $validated['slug'];
        $counter = 1;

        while (Blog::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }


        if ($request->hasFile('image')) {

            $validated['image'] =
                $this->uploadImage($request->file('image'));
        }

        $validated['featured'] =
            $request->boolean('featured');

        $validated['status'] =
            $request->boolean('status');


        if (empty($validated['author'])) {
            $validated['author'] = 'Stonespire Graphics';
        }


        Blog::create($validated);


        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',

            'slug'              => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,

            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'category'          => 'nullable|string|max:100',

            'short_description' => 'nullable|string',
            'content'           => 'required|string',

            'author'            => 'nullable|string|max:255',

            'quote'             => 'nullable|string|max:1000',
            'quote_author'      => 'nullable|string|max:255',

            'read_time'         => 'nullable|integer|min:1',

            'sort_order'        => 'nullable|integer|min:0',

            'published_at'      => 'nullable|date',

            'featured'          => 'nullable|boolean',
            'status'            => 'nullable|boolean',
        ]);

        $validated['slug'] = $validated['slug']
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $originalSlug = $validated['slug'];
        $counter = 1;

        while (
            Blog::where('slug', $validated['slug'])
                ->where('id', '!=', $blog->id)
                ->exists()
        ) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        if ($request->hasFile('image')) {

            if ($blog->image) {

                $oldImage = public_path($blog->image);

                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
            }

            $validated['image'] =
                $this->uploadImage($request->file('image'));
        }

        $validated['featured'] =
            $request->boolean('featured');

        $validated['status'] =
            $request->boolean('status');


        if (empty($validated['author'])) {
            $validated['author'] = 'Stonespire Graphics';
        }

        $blog->update($validated);


        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {

            $image = public_path($blog->image);

            if (File::exists($image)) {
                File::delete($image);
            }
        }

        $blog->delete();


        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }

    private function uploadImage($file)
    {
        $uploadPath =
            public_path('assets/images/blogs');

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


        return 'assets/images/blogs/' . $filename;
    }
}