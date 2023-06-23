<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
    }

    public function show(Request $request){
        $dokumen = 0;
        $user = 0;
        $berita = 0;
        $gallery = 0;

        $data = [
            'dokumen' => $dokumen,
            'user' => $user,
            'berita' => $berita,
            'gallery' => $gallery
        ];
        return $this->successResponse($data);
    }
}
