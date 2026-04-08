<?php

namespace App\Http\Controllers;

use App\Models\drivers;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class DriversController extends Controller
{
   
    public function index()
    {
        return view('character.index', [
            'e' => drivers::all(),
            'i' => Images::all(),
        ]);
    }

    public function add(Request $request)
    {
        $eventId = $request->input('character_id');
        return redirect()->route('characters.index')->with('success', 'Driver added.');
    }


    public function create()
    {
        return view('character.create_event');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'nullable|mimes:png,jpg,webp',
            'nama' => 'nullable|string|max:255',
            'status'=> 'required',
        ]);

        $filePaths = [];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_file.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/events/';
            $file->move($path, $filename);
            $filePaths['file'] = $path . $filename;
        }

        drivers::create([
            'file' => $filePaths['file'] ?? null,
            'nama' => $request->nama,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(drivers $event)
    {
        return view('character.edit_event', ['event' => $event]);
    }

    public function update(Request $request, drivers $event)
    {
        $data = $request->validate([
            'file' => 'nullable|mimes:png,jpg,webp',
            'nama' => 'nullable|string|max:255',
            'status'=> 'required',
        ]);

        $filePaths = [];

        if ($request->hasFile('file')) {
            // Store the old file path
            $oldFilePath = $event->file;

            $file = $request->file('file');
            $filename = time() . '_file.' . $file->getClientOriginalExtension();
            $path = 'public/assets/img/events/';
            $file->move($path, $filename);
            $filePaths['file'] = $path . $filename;

            // Delete the old file
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }

        $event->update([
            'file' => $filePaths['file'] ?? $event->file,
            'nama' => $request->nama ?? $event->nama,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('success', 'Driver updated successfully');
    }

    public function destroy(drivers $event)
    {
        // Delete the event file if it exists
        if (File::exists($event->file)) {
            File::delete($event->file);
        }

        $event->delete();

        return redirect()->route('dashboard')->with('success', 'Driver deleted successfully');
    }
}
