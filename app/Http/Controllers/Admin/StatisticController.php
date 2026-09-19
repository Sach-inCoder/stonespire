<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('sort_order')->get();

        return view('admin.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.statistics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'value'      => 'required|string|max:255',
            'label'      => 'required|string|max:255',
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Statistic::create([
            'value'      => $request->value,
            'label'      => $request->label,
            'icon'       => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status'),
        ]);

        return redirect()
            ->route('admin.statistics.index')
            ->with('success', 'Statistic added successfully.');
    }

    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'value'      => 'required|string|max:255',
            'label'      => 'required|string|max:255',
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $statistic->update([
            'value'      => $request->value,
            'label'      => $request->label,
            'icon'       => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->has('status'),
        ]);

        return redirect()
            ->route('admin.statistics.index')
            ->with('success', 'Statistic updated successfully.');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()
            ->route('admin.statistics.index')
            ->with('success', 'Statistic deleted successfully.');
    }
}