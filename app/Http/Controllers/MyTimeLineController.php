<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Validator;

class MyTimeLineController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        $sortTarget = 'id';
        //感想記事を5個ずつidの降順に取り出す
        $articleItems = Articles::orderBy($sortTarget, 'DESC')->paginate(5);
        return view(
            'timeLine.myTimeLine',
            ['articleItems' => $articleItems, 'sortTarget' => $sortTarget]
        );
    }
}
