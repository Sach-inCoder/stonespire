<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('sort_order')->get();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'logo'       => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:10240',
            'website'    => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'website',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/clients'),
                $filename
            );

            $data['logo'] = 'assets/images/clients/' . $filename;
        }

        Client::create($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client added successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'logo'       => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:10240',
            'website'    => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only([
            'name',
            'website',
            'sort_order',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('logo')) {

            if (
                $client->logo &&
                File::exists(public_path($client->logo))
            ) {
                File::delete(public_path($client->logo));
            }

            $file = $request->file('logo');

            $filename = time() . '_' . uniqid() . '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('assets/images/clients'),
                $filename
            );

            $data['logo'] = 'assets/images/clients/' . $filename;
        }

        $client->update($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        if (
            $client->logo &&
            File::exists(public_path($client->logo))
        ) {
            File::delete(public_path($client->logo));
        }

        $client->delete();

        return redirect()
            ->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}