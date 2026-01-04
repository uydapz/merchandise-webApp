<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{


    public function index()
    {
        $catalogue = Catalog::all();
        return view('components.pages.AdminCatalogue', [
            'title' => 'Katalog',
            'catalogue' => $catalogue
        ]);
    }

    public function show()
    {
        $catalogue = Catalog::latest()->get();
        return view('components.pages.Catalogue', [
            'title' => 'Catalogue',
            'catalogue' => $catalogue
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $catalogue = new Catalog();
        $catalogue->title = $request->title;
        $catalogue->description = $request->description;
        $catalogue->price = $request->price;
        $catalogue->category = $request->category;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/catalogue', $filename);
            $catalogue->image = $filename;
        }

        $catalogue->save();

        return redirect()->back()->with('success', 'Catalog created successfully.');
    }

    public function update(Request $request, $id)
    {
        $catalogue = Catalog::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $catalogue->title = $request->title;
        $catalogue->description = $request->description;
        $catalogue->price = $request->price;
        $catalogue->category = $request->category;

        if ($request->hasFile('image')) {
            if ($catalogue->image) {
                Storage::delete('public/catalogue/' . $catalogue->image);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/catalogue', $filename);
            $catalogue->image = $filename;
        }

        $catalogue->save();

        return redirect()->back()->with('success', 'Catalog updated successfully.');
    }

    public function destroy($id)
    {
        $catalogue = Catalog::findOrFail($id);

        if ($catalogue->image) {
            $imagePath = 'public/catalogue/' . $catalogue->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        $catalogue->delete();

        return redirect()->back()->with('success', 'Catalog deleted successfully.');
    }
}
