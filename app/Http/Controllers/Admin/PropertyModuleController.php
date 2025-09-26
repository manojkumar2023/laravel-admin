<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyModule;
use App\Models\PropertyType;
use App\Models\PropertyArea;
use App\Helpers\SlugHelper;
use Illuminate\Http\Request;

class PropertyModuleController extends Controller
{
    public function index()
    {
        $items = PropertyModule::all();
        return view('admin.pages.propertyModules.index', compact('items'));
    }

    public function create()
    {
        $propertyTypes = \App\Models\PropertyType::all();
        $propertyAreas = \App\Models\PropertyArea::all();
        return view('admin.pages.propertyModules.create', compact('propertyTypes', 'propertyAreas'));
    }

    public function store(Request $request)
    {
        // Validate and store the new property module
        $request->validate([
            'property_type_id' => 'required|exists:property_types,id',
            'property_area_id' => 'required|exists:property_areas,id',
            'property_module_name' => 'required|string|max:255',
            'status' => 'required|in:707,505',
        ]);

        // Assuming you have a PropertyModule model
        PropertyModule::create([
            'property_type_id' => $request->property_type_id,
            'property_area_id' => $request->property_area_id,
            'property_module_name' => $request->property_module_name,
            'slug' => SlugHelper::uniqueSlug(PropertyModule::class, $request->property_module_name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.property-modules.index')->with('success', 'Property Module created successfully.');
    }

    public function edit($id)
    {
        $item = \App\Models\PropertyModule::findOrFail($id);
        $propertyTypes = \App\Models\PropertyType::all();
        $propertyAreas = \App\Models\PropertyArea::all();
        return view('admin.pages.propertyModules.edit', compact('item', 'propertyTypes', 'propertyAreas'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the property module
        $request->validate([
            'property_type_id' => 'required|exists:property_types,id',
            'property_area_id' => 'required|exists:property_areas,id',
            'property_module_name' => 'required|string|max:255',
            'status' => 'required|in:707,505',
        ]);

        $item = \App\Models\PropertyModule::findOrFail($id);
        $item->update([
            'property_module_name' => $request->property_module_name,
            'property_type_id' => $request->property_type_id,
            'property_area_id' => $request->property_area_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.property-modules.index')->with('success', 'Property Module updated successfully.');
    }

    public function destroy($id)
    {
        $item = \App\Models\PropertyModule::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.property-modules.index')->with('success', 'Property Module deleted successfully.');
    }

    // Return property areas for a given property type (AJAX)
    public function areasByType($typeId)
    {
        $areas = PropertyArea::where('property_type_id', $typeId)->get(['id', 'property_area_name']);
        return response()->json($areas);
    }
}
