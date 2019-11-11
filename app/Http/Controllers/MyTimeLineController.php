<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
        $articleItems = DB::table('articles')
            ->where('user_id', $user_id)
            ->orderBy($sortTarget, 'DESC')
            ->paginate(5);

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
        $user_id = intval($request->user_id);
        $deleteArticle_id = intval($request->article_id);
        //対象のユーザーの記事を削除
        $result = Articles::deleteArticle($deleteArticle_id);
        //return $result;
        return response()->json($result);
    }

    /**
     * ユーザーの感想記事本文更新
     */
    public function updateMyArticle(Request $request)
    {
        # code...
        $updateArticle_id = intval($request->updateArticle_id);
        $updateMessage = strval($request->updateMessage);
        //対象のユーザーの記事の本文を更新
        Articles::updateArticle($updateArticle_id, $updateMessage);
        return redirect('/mytimeline');
    }
}
