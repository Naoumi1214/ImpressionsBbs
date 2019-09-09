<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $sortTarget = 'id';
        //感想記事を5個ずつidの降順に取り出す
        $articleItems = Articles::orderBy($sortTarget, 'DESC')->paginate(5);
        return view(
            'timeLine.index',
            ['articleItems' => $articleItems, 'sortTarget' => $sortTarget]
        );
    }

    public function inArticle(Request $request)
    {
        # code...
        //↓Ajaxの送信内容の確認テスト

        $validator = Validator::make(
            $request->all(),
            Articles::$rules,
            Articles::$messages
        );

        if ($validator->fails()) {
            //バリデーションエラー時にJsonでエラーメッセージを返す
            return response()->json($validator->errors());
        }

        //感想記事を新規保存
        $article = new Articles();
        $form = $request->all();
        unset($form['_token']);
        $article->fill($form)->save();

        return response()->json($form);
        //var_dump($form);
        //return view('timeLine.index');
    }
}
