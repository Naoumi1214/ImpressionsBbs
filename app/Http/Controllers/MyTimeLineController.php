<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class MyTimeLineController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        //ログインユーザー情報獲得
        $user = Auth::user();
        $user_id = intval($user->id);

        $sortTarget = 'id';
        //ユーザーの感想記事を5個ずつidの降順に取り出す
        $articleItems =  Articles::find($user_id)->getUserArticle($user_id, $sortTarget); //ユーザーの記事を取得
        return view(
            'timeLine.myTimeLine',
            [
                'articleItems' => $articleItems, 'sortTarget' => $sortTarget,
                'user' => $user
            ]
        );
    }
    /**
     *  ユーザーの感想記事削除
     */
    public function deleteMyArticle(Request $request)
    {
        # code...

    }
}
