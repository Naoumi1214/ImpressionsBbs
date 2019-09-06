<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Validator;

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
        //↓Ajaxの送信内容の確認テスト
        return response()->json(['title' => $request->title, 'message' => $request->message]);

        $validator = Validator::make(
            $request->all(),
            Articles::$rules,
            Articles::$messages
        );

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        return response()->json(['seiko' => '成功']);
        //return view('timeLine.index');
    }
}
