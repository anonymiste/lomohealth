<?php

// routes/web.php
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/pdf/{qr_code}', function ($qr_code) {
    $child = Child::where('qr_code', $qr_code)->firstOrFail();

    $qrImage = QrCode::format('png')->size(300)->generate(route('child.show', $qr_code));

    $pdf = Pdf::loadView('pdf.bracelet', compact('child', 'qrImage'));
    return $pdf->stream('LomoHealth-'.$qr_code.'.pdf');
})->name('pdf.bracelet');