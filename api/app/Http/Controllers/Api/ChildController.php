<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ChildController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'mother_phone' => 'required|string',
            'language' => 'required|in:fr,ewe,kabiye'
        ]);

        $qr = 'LOMO' . strtoupper(substr(md5(time() . $data['mother_phone']), 0, 10));
        
        $child = Child::create(array_merge($data, ['qr_code' => $qr]));

        return response()->json([
            'success' => true,
            'qr_code' => $qr,
            'pdf_url' => url('/pdf/' . $qr)
        ]);
    }

    public function show($qr_code)
    {
        $child = Child::with('vaccinations')->where('qr_code', $qr_code)->firstOrFail();
        return response()->json($child);
    }
}