<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobils; 
use App\Models\images; 
use Illuminate\Support\Facades\File;

class MobilsController extends Controller // Change 'charactercontroller' to 'CharacterController' for proper capitalization
{
    public function index()
    {
        return view('character.index', [
            'c' => mobils::all(),
            'i' => images::all(),
        ]);
    }

    

    public function add(Request $request)
    {
        $characterId = $request->input('character_id');

        return redirect()->route('characters.index')->with('success', 'Character added to your account.');
    }



    public function page()
    {
        return view('character.page', [
            'c' => mobils::all(),
            'i' => images::all(),
        ]);
    }
    public function pendaftaran()
    {
        return view('character.pendaftaran', [
            'i' => Images::all(),
        ]);
    }
    public function create()
    {
        return view('character.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'nullable|mimes:png,jpg',
            'unit' => 'nullable|string|max:255',
            'status' => 'required',
            'interior_image' => 'nullable|mimes:png,jpg',
            'feature' => 'nullable|string|max:255',
        ]);

        $filePaths = [];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_file.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/karakters/';
            $file->move($path, $filename);
            $filePaths['file'] = $path . $filename;
        }
        if ($request->hasFile('interior_image')) {
            $file = $request->file('interior_image');
            $filename = time() . '_interior_image.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/karakters/';
            $file->move($path, $filename);
            $filePaths['interior_image'] = $path . $filename;
        }
        
        mobils::create([
            'file' => $filePaths['file'] ?? null,
            'status' => $request->status,
            'unit'=> $request->unit,
            'interior_image' => $filePaths['interior_image'] ?? null,
            'feature'=> $request->feature,
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(mobils $character)
    {
        return view('character.edit', ['character' => $character]);
    }
    public function update(Request $request, mobils $character)
    {
        $data = $request->validate([
            'file' => 'nullable|mimes:png,jpg',
            'unit' => 'nullable|string|max:255',
            'status' => 'required',
            'interior_image' => 'nullable|mimes:png,jpg',
            'feature' => 'nullable|string|max:255',
        ]);
    
        $filePaths = [];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_file.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/karakters/';
            $file->move($path, $filename);
            $filePaths['file'] = $path . $filename;
        }
        if ($request->hasFile('interior_image')) {
            $file = $request->file('interior_image');
            $filename = time() . '_interior_image.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/karakters/';
            $file->move($path, $filename);
            $filePaths['interior_image'] = $path . $filename;
        }
            $character->update([
            'file' => $filePaths['file'] ?? $character->file,
            'unit' => $request->unit ?? $character->unit,
            'status' => $request->status,
            'interior_image' => $filePaths['interior_image'] ?? $character->interior_image,
            'feature' => $request->feature ?? $character->feature,
        ]);
    
        // Save the updated character
        $character->save();
    
        return redirect()->route('dashboard')->with('success', 'updated successfully');
    }
    public function destroy(mobils $character){
        
        $character->delete();


        return redirect(route('dashboard'))->with('success, delete success');
    }
}
