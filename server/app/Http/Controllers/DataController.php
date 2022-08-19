<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Get some data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        return response()->json( [
            'timestamp' => now(),
            // 'user' => $request->user()
        ]);
    }
}