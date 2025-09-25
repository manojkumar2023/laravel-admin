<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Helpers\SlugHelper;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $items = PropertyType::all();
        return view('admin.pages.propertyType.index', compact('items'));
    }

    public function create()
    {
        return view('admin.pages.propertyType.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['property_type_name', 'status']);
        $data['slug'] = SlugHelper::uniqueSlug(PropertyType::class, $data['property_type_name']);
        PropertyType::create($data);
        return redirect()->route('admin.property-types.index')->with('success', 'Property Type created successfully.');
    }

    public function edit($id)
    {
        $item = PropertyType::findOrFail($id);
        return view('admin.pages.propertyType.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $propertyType = PropertyType::findOrFail($id);
        $data = $request->only(['property_type_name', 'status']);
        $data['slug'] = SlugHelper::uniqueSlug(PropertyType::class, $data['property_type_name'], 'slug', $id);
        $propertyType->update($data);
        return redirect()->route('admin.property-types.index')->with('success', 'Property Type updated successfully.');
    }

    public function destroy($id)
    {
        $propertyType = PropertyType::findOrFail($id);
        $propertyType->delete();

        return redirect()->route('admin.property-types.index')->with('success', 'Property Type deleted successfully.');
    }
}
