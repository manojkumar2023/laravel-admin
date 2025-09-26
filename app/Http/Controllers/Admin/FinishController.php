<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\Finish;
use App\Models\PropertyArea;
use App\Models\PropertyModule;
use App\Models\PropertyType;
use App\Models\Material;
use Illuminate\Http\Request;

class FinishController extends Controller
{
    public function index()
    {
        $items = Finish::all();
        return view('admin.pages.finishes.index', compact('items'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $propertyAreas = PropertyArea::all();
        $propertyModules = PropertyModule::all();
        $materials = Material::all();
        return view('admin.pages.finishes.create', compact('propertyTypes', 'propertyAreas', 'propertyModules', 'materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'finish_name' => 'required|string|max:255',
            'status' => 'required|in:707,505',
            'property_type_id' => 'required|exists:property_types,id',
            'property_area_id' => 'required|exists:property_areas,id',
            'property_module_id' => 'required|exists:property_modules,id',
            'material_id' => 'required|exists:materials,id',
        ]);

        Finish::create([
            'property_type_id' => $request->property_type_id,
            'property_area_id' => $request->property_area_id,
            'property_module_id' => $request->property_module_id,
            'material_id' => $request->material_id,
            'finish_name' => $request->finish_name,
            'slug' => SlugHelper::uniqueSlug(Finish::class, $request->finish_name),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.finishes.index')->with('success', 'Finish created successfully.');
    }

    public function edit($id)
    {
        $item = Finish::findOrFail($id);
        $propertyTypes = PropertyType::all();
        $propertyAreas = PropertyArea::all();
        $propertyModules = PropertyModule::all();
        $materials = Material::all();
        return view('admin.pages.finishes.edit', compact('item', 'propertyTypes', 'propertyAreas', 'propertyModules', 'materials'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'property_type_id' => 'required|exists:property_types,id',
            'property_area_id' => 'required|exists:property_areas,id',
            'property_module_id' => 'required|exists:property_modules,id',
            'material_id' => 'required|exists:materials,id',
            'finish_name' => 'required|string|max:255',
            'status' => 'required|in:707,505',
        ]);

        $item = Finish::findOrFail($id);
        $item->update([
            'finish_name' => $request->finish_name,
            'slug' => SlugHelper::uniqueSlug(Finish::class, $request->finish_name),
            'property_type_id' => $request->property_type_id,
            'property_area_id' => $request->property_area_id,
            'property_module_id' => $request->property_module_id,
            'material_id' => $request->material_id,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.finishes.index')->with('success', 'Finish updated successfully.');
    }

    public function destroy($id)
    {
        $item = Finish::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.finishes.index')->with('success', 'Finish deleted successfully.');
    }

    /**
     * Return materials for a given property module as JSON.
     */
    public function materialsByModule($moduleId)
    {
        $materials = Material::where('property_module_id', $moduleId)->get(['id', 'material_name']);
        return response()->json($materials);
    }
}
