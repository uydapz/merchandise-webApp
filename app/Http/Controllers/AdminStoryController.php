<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminStoryController extends Controller
{
    public function index()
    {
        $articles = Story::where('user_id',Auth::user()->id)->with('user')->get();
        $users = User::all();

        return view('components.pages.AdminStory', [
            'title' => 'Story',
            'articles' => $articles,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:stories,title|max:60',
            'body' => 'required|string',
            'excerpt' => 'required|string|max:120',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $story = new Story();
        $story->title = $request->title;
        $story->excerpt = $request->excerpt;
        $story->body = $request->body;
        $story->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/story', $filename);
            $story->image = $filename;  // Menyimpan nama file ke dalam model Story
        }

        $slug = Str::slug($story->title);
        $baseSlug = $slug;
        $i = 1;

        while (Story::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i;
            $i++;
        }

        $story->slug = $slug;

        $story->save();

        return redirect()->back()->with('success', 'Story created successfully.');
    }

    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:60',
            'body' => 'required|string',
            'excerpt' => 'required|string|max:120',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $story->title = $request->title;
        $story->excerpt = $request->excerpt;
        $story->body = $request->body;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($story->image) {
                Storage::delete('public/story/' . $story->image);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/story', $filename);
            $story->image = $filename;
        }

        $slug = Str::slug($story->title);
        $baseSlug = $slug;
        $i = 1;

        while (Story::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i;
            $i++;
        }

        $story->slug = $slug;

        $story->save();

        return redirect()->back()->with('success', 'Story updated successfully.');
    }

    public function destroy($id)
    {
        $story = Story::findOrFail($id);

        // Hapus gambar jika ada
        if ($story->image) {
            $imagePath = 'public/story/' . $story->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        $story->delete();

        return redirect()->back()->with('success', 'Story deleted successfully.');
    }
}
