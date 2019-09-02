<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * タイムライン関係のController
 */
class TimeLineController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        return view('timeLine.index');
    }
}
