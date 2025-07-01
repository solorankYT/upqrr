<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QrScan extends Controller
{
   public function generateQrCode()
    {
        $user = auth()->user(); 

        $url = route('dashboard', ['user' => $user->id]);

        $qrCode = QrCode::size(300)->generate($url);

        return view('Pages.QrScan.index', compact('qrCode'));

    }

}
