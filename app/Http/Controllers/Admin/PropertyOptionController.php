<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\PropertyOption;
use App\Helpers\SlugHelper;
use Illuminate\Http\Request;

class PropertyOptionController extends Controller
{
    public function index()
    {
        $items = PropertyOption::with('propertyType')->get();
        return view('admin.pages.propertyOptions.index', compact('items'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all(); // Assuming you have a PropertyType model
        return view('admin.pages.propertyOptions.create', compact('propertyTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_option_name' => 'required|unique:property_options,property_option_name',
        ]);

        // Store the property option in the database
        PropertyOption::create([
            'property_option_name' => $request->property_option_name,
            'slug' => SlugHelper::uniqueSlug(PropertyOption::class, $request->property_option_name),
            'property_type_id' => $request->property_type_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.property-options.index')->with('success', 'Property Option created successfully.');
    }

    public function edit($id)
    {
        $propertyTypes = PropertyType::all(); // Assuming you have a PropertyType model
        $item = PropertyOption::findOrFail($id);
        return view('admin.pages.propertyOptions.edit', compact('item', 'propertyTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'property_option_name' => 'required|unique:property_options,property_option_name,' . $id,
        ]);

        $item = PropertyOption::findOrFail($id);
        $item->update([
            'property_option_name' => $request->property_option_name,
            'slug' => SlugHelper::uniqueSlug(PropertyOption::class, $request->property_option_name, 'slug', $id),
            'status' => $request->status,
            'property_type_id' => $request->property_type_id, // Assuming you have a property_type_id field
        ]);

        return redirect()->route('admin.property-options.index')->with('success', 'Property Option updated successfully.');
    }

    public function destroy($id)
    {
        $item = PropertyOption::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.property-options.index')->with('success', 'Property Option deleted successfully.');
    }
}
