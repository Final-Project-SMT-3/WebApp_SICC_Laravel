<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getData()
    {
        $data = DB::table('');
        return response()->json($data);
    }
}
