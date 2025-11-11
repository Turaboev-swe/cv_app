<?php

namespace App\Http\Controllers;
use App\Models\AboutMe;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
public function index()
    {
        $aboutMe = AboutMe::first();
        return view('aboutme.index', compact('aboutMe'));
    }

    public function create()
    {
        return view('aboutme.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bio' => 'required|string',
            'profile_photo' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'location' => 'nullable|string',
        ]);

        AboutMe::create($request->all());

        return redirect()->route('aboutme.index')->with('success', 'About Me information created.');
    }

    public function show(AboutMe $aboutMe)
    {
        return view('aboutme.show', compact('aboutMe'));
    }

    public function edit(AboutMe $aboutMe)
    {
        return view('aboutme.edit', compact('aboutMe'));
    }

    public function update(Request $request, AboutMe $aboutMe)
    {
        $request->validate([
            'bio' => 'required|string',
            'profile_photo' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'location' => 'nullable|string',
        ]);

        $aboutMe->update($request->all());

        return redirect()->route('aboutme.index')->with('success', 'About Me updated.');
    }

    public function destroy(AboutMe $aboutMe)
    {
        $aboutMe->delete();
        return redirect()->route('aboutme.index')->with('success', 'About Me deleted.');
    }
}
