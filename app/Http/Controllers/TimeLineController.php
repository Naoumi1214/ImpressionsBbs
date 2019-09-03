<?php

namespace App\Http\Controllers;

use App\Articles;
use Faker\Provider\en_IN\Person;
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

    public function inArticle(Request $request)
    {
        # code...
        $validator = $this->validate($request,Articles::$rules,Articles::$messages);
        if ($validator->fails()) {
            return redirect('/')
                  ->withErrors($validator)
                  ->withInput();
          }
        return view('timeLine.index');
    }
}
