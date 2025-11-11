<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'language_name' => 'required|string',
            'level' => 'nullable|string',
        ]);

        Language::create($request->all());

        return redirect()->route('languages.index')->with('success', 'Language created.');
    }

    public function show(Language $language)
    {
        return view('languages.show', compact('language'));
    }

    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'language_name' => 'required|string',
            'level' => 'nullable|string',
        ]);

        $language->update($request->all());

        return redirect()->route('languages.index')->with('success', 'Language updated.');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('success', 'Language deleted.');
    }
}
