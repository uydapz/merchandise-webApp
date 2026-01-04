<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        return view('components.pages.AdminCustomer', [
            'title' => 'Customer',
            'customer' => Client::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'said' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customer = new Client();
        $customer->title = $request->title;
        $customer->name = $request->name;
        $customer->said = $request->said;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/customer', $filename);
            $customer->image = $filename;
        }

        $customer->save();


        return redirect()->back()->with('success', 'Client created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'said' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,webp,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $customer = Client::find($id);
    
        if (!$customer) {
            return redirect()->back()->with('error', 'Client not found.');
        }
    
        $customer->title = $request->title;
        $customer->name = $request->name;
        $customer->said = $request->said;
    
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($customer->image && file_exists(storage_path('app/public/customer/' . $customer->image))) {
                unlink(storage_path('app/public/customer/' . $customer->image));
            }
    
            // Simpan gambar baru
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/customer', $filename);
            $customer->image = $filename;
        }
    
        $customer->save();
    
        return redirect()->back()->with('success', 'Client updated successfully.');
    }
    
    

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->back()->with('success', 'Client deleted successfully.');
    }
}
