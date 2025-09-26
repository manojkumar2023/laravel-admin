<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\PropertyArea;
use App\Models\PropertyModule;
use App\Models\Material;

/**
 * Controller for managing materials. Minimal CRUD implemented so views receive required data.
 */
class MaterialController extends Controller
{
    public function index()
    {
        $items = Material::all();
        return view('admin.pages.materials.index', compact('items'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $propertyAreas = PropertyArea::all();
        $propertyModules = PropertyModule::all();
        return view('admin.pages.materials.create', compact('propertyTypes', 'propertyAreas', 'propertyModules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_name' => 'required|string|max:255',
            'status' => 'required|in:707,505',
            'property_type_id' => 'required|exists:property_types,id',
            'property_area_id' => 'required|exists:property_areas,id',
            'property_module_id' => 'required|exists:property_modules,id',
        ]);

        Material::create([
            'property_type_id' => $request->property_type_id,
            'property_area_id' => $request->property_area_id,
            'property_module_id' => $request->property_module_id,
            'material_name' => $request->material_name,
            'slug' => SlugHelper::uniqueSlug(Material::class, $request->material_name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Material created successfully.');
    }

    public function edit($id)
    {
        $item = Material::findOrFail($id);
        $propertyTypes = PropertyType::all();
        $propertyAreas = PropertyArea::all();
        $propertyModules = PropertyModule::all();
        return view('admin.pages.materials.edit', compact('item', 'propertyTypes', 'propertyAreas', 'propertyModules'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'property_type_id' => 'required|exists:property_types,id',
            'property_area_id' => 'required|exists:property_areas,id',
            'property_module_id' => 'required|exists:property_modules,id',
            'material_name' => 'required|string|max:255',
            'status' => 'required|in:707,505',
        ]);

        $item = Material::findOrFail($id);
        $item->update([
            'material_name' => $request->material_name,
            'slug' => SlugHelper::uniqueSlug(Material::class, $request->material_name),
            'property_type_id' => $request->property_type_id,
            'property_area_id' => $request->property_area_id,
            'property_module_id' => $request->property_module_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.materials.index')->with('success', 'Material updated successfully.');
    }

    public function destroy($id)
    {
        $item = Material::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Material deleted successfully.');
    }
}

