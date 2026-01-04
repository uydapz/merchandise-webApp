<?php

namespace App\Http\Controllers;

use App\Models\Spanduk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SpandukController extends Controller
{
    public function index()
    {
        return view('components.pages.AdminSpanduk', [
            'title' => 'Spanduk',
            'spanduk' => Spanduk::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'link' => 'nullable|string|max:255|active_url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only('title', 'description', 'link');

        Spanduk::create($data);

        return redirect()->back()->with('success', 'Spanduk created successfully.');
    }

    public function update(Request $request, $id)
    {
        $spanduk = Spanduk::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'link' => 'nullable|string|max:255|active_url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only('title', 'description', 'link');

        $spanduk->update($data);

        return redirect()->back()->with('success', 'Spanduk updated successfully.');
    }

    public function destroy($id)
    {
        $spanduk = Spanduk::findOrFail($id);
        $spanduk->delete();

        return redirect()->back()->with('success', 'Spanduk deleted successfully.');
    }
}
