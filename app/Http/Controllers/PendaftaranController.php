<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Images;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('character.pendaftaran', [
            'i' => Images::all(),
        ]);
    }

    public function create()
    {
        return view('character.pendaftaran', [
            'i' => Images::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'unit' => 'required|string|max:255',
            'driver' => 'nullable|string|max:255',
            'tambahan' => 'nullable|string',
        ]);

        Pendaftaran::create($data);

       // Generate WhatsApp message
       $whatsappNumber = '+62'; // Replace with your WhatsApp number
       $message = "Order Adipati Rental\n";
       $message .= "Name: {$data['nama']}\n";
       $message .= "Date: {$data['tanggal']}\n";
       $message .= "Time: {$data['jam']}\n";
       $message .= "Unit: {$data['unit']}\n";
       if (!empty($data['driver'])) {
           $message .= "Driver: {$data['driver']}\n";
       }
       if (!empty($data['tambahan'])) {
           $message .= "Tambahan/Tujuan: {$data['tambahan']}\n";
       }

       // Encode message for URL
       $encodedMessage = urlencode($message);
       $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$encodedMessage}";

       // Redirect to WhatsApp
       return redirect()->away($whatsappUrl);
   }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()->route('dashboard')
            ->with('success', 'History deleted successfully');
    }
}