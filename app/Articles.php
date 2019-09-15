<?php

namespace App;

use Dotenv\Validator;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\String_;
use Illuminate\Support\Facades\DB;

/**
 * 感想記事のクラス
 */
class Articles extends Model
{
    //
    protected $table = 'articles';

    protected $guarded = array('id');

    //バリデーションルール
    public static $rules = [
        'title' => 'required|',
        'message' => 'required|',
    ];

    //バリデーションのエラーメッセージ
    public static $messages = [
        'title.required' => '*タイトルを入力してください。',
        'message.required' => '*感想を入力してください。',
    ];

    /**
     * ユーザーの記事を取得する
     *
     */
    public function getUserArticle(int $user_id,string $sortTarget):object
    {
        # code...
        $article = DB::table($this->table)
            ->where('user_id', $user_id)->orderBy($sortTarget, 'DESC')->paginate(5);

        return $article;
    }
}
