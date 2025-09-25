<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\PropertyArea;
use App\Helpers\SlugHelper;
use Illuminate\Http\Request;

class PropertyAreaController extends Controller
{
    public function index()
    {
        // Code for listing property areas
        $items = PropertyArea::with('propertyType')->get();
        return view('admin.pages.propertyAreas.index', compact('items'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        return view('admin.pages.propertyAreas.create', compact('propertyTypes'));
    }

    public function store(Request $request)
    {
        // Code for storing a new property area
        $request->validate([
            'property_area_name' => 'required|string|max:255',
            'property_type_id' => 'required|exists:property_types,id',
        ]);

        $slug = SlugHelper::uniqueSlug(PropertyArea::class, $request->property_area_name);

        PropertyArea::create([
            'property_area_name' => $request->property_area_name,
            'slug' => $slug,
            'property_type_id' => $request->property_type_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.property-areas.index')->with('success', 'Property area created successfully.');
    }

    public function edit($id)
    {
        $item = PropertyArea::findOrFail($id);
        $propertyTypes = PropertyType::all();
        return view('admin.pages.propertyAreas.edit', compact('item', 'propertyTypes'));
    }
    public function show($id)
    {
        $item = PropertyArea::findOrFail($id);
        return view('admin.pages.propertyAreas.show', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Code for updating a property area
        $request->validate([
            'property_area_name' => 'required|string|max:255',
            'property_type_id' => 'required|exists:property_types,id',
        ]);
        $propertyArea = PropertyArea::findOrFail($id);
        $propertyArea->update([
            'property_area_name' => $request->property_area_name,
            'property_type_id' => $request->property_type_id,
            'slug' => SlugHelper::uniqueSlug(PropertyArea::class, $request->property_area_name, 'slug', $id),
            'status' => $request->status,
        ]);
        return redirect()->route('admin.property-areas.index')->with('success', 'Property area updated successfully.');
    }

    public function destroy($id)
    {
        // Code for deleting a property area
        $propertyArea = PropertyArea::findOrFail($id);
        $propertyArea->delete();
        return redirect()->route('admin.property-areas.index')->with('success', 'Property area deleted successfully.');
    }
}
