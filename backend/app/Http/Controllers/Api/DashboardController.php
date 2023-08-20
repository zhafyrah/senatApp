<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DokumenPleno;
use App\Models\User;
use App\Models\Berita;
use App\Models\Gallery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        $dokumen = DokumenPleno::count();
        $user = User::count();
        $berita = Berita::count();
        $gallery = Gallery::count();

        $data = [
            'dokumen' => $dokumen,
            'user' => $user,
            'berita' => $berita,
            'gallery' => $gallery
        ];
        return $this->successResponse($data);
    }
    public function getChartData(Request $request)
    {
        $currentYear = date('Y');

        $query = DokumenPleno::selectRaw('MONTHNAME(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderByRaw('MONTH(created_at)')
            ->get();

        // Create a dictionary with lowercase month names as keys and counts as values
        $monthCounts = $query->pluck('count', 'month')->mapWithKeys(function ($count, $month) {
            return [strtolower($month) => $count];
        });

        // Generate the response with counts for all months, showing 0 if count is not available
        $response = [];
        $months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];


        foreach ($months as $month) {

            $response[] = [
                'month' => ucfirst($month),
                'count' => $monthCounts[strtolower($month)] ?? 0,
            ];
        }

        return response()->json($response);
    }
}
