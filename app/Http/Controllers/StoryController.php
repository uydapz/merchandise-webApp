<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $story = Story::latest()->paginate(3);

        return view('components.pages.Story', [
            'title' => 'Story',
            'story'  => $story
        ]);
    }

    public function show($slug)
    {

        $story = Story::where('slug', $slug)->with('user')->firstOrFail();

        return view('components.pages.StoryDetail', [
            'title' => 'Artikel - ' . $story->title,
            'story' => $story,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Story::where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->paginate(10);

        // Pastikan untuk mengirimkan variabel 'title' ke view
        return view('components.pages.Result', [
            'title' => 'Search Results', // Contoh judul yang bisa diubah sesuai kebutuhan
            'query' => $query,
            'results' => $results,
        ]);
    }
}
