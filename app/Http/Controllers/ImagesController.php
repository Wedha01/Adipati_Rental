<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller // Change 'charactercontroller' to 'CharacterController' for proper capitalization
{
    public function index()
    {
        return view('character.pendaftaran', [
            'i' => Images::all(),
        ]);
    }

    

    public function add(Request $request)
    {
        $characterId = $request->input('image_id');

        return redirect()->route('characters.index')->with('success', 'images succesfully added.');
    }

    public function page()
    {
        return view('character.page', [
            'i' => Images::all(),
        ]);
    }

    public function create()
    {
        return view('character.create_image');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'logo' => 'required|mimes:png,jpg',
            'banner' => 'required|mimes:png,jpg',
        ]);

        $filePaths = [];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/logo/';
            $file->move($path, $filename);
            $filePaths['logo'] = $path . $filename;
        }

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '_banner.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/banner/';
            $file->move($path, $filename);
            $filePaths['banner'] = $path . $filename;
        }
        
        Images::create([
            'logo' => $filePaths['logo'],
            'banner' => $filePaths['banner'],
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(Images $image)
    {
        return view('character.edit_image', ['image' => $image]);
    }
    public function update(Request $request, Images $image)
    {
        $data = $request->validate([
            'logo' => 'nullable|mimes:png,jpg',
            'banner' => 'nullable|mimes:png,jpg',
        ]);
    
        $filePaths = [];
    
        if ($request->hasFile('logo')) {
            $oldFilePath = $image->logo; // Match column
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/logo/';
            $file->move($path, $filename);
            $filePaths['logo'] = $path . $filename;
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
            $image->logo = $filePaths['logo'];
        }
    
        if ($request->hasFile('banner')) {
            $oldFilePath = $image->banner; // Match column
            $file = $request->file('banner');
            $filename = time() . '_banner.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/banner/';
            $file->move($path, $filename);
            $filePaths['banner'] = $path . $filename;
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
            $image->banner = $filePaths['banner'];
        }
    
        $image->save();
    
        return redirect()->route('dashboard')->with('success', 'Image updated successfully');
    }
    public function destroy(Images $image){
        
        $image->delete();


        return redirect(route('dashboard'))->with('success, Image delete success');
    }
}
