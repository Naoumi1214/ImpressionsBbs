<?php

namespace App;

use Dotenv\Validator;
use Illuminate\Database\Eloquent\Model;

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
        'title' => 'required',
        'message' => 'required',
    ];

    //バリデーションのエラーメッセージ
    public static $messages = [
        'title.required' => 'タイトルを入力してください。',
        'message.required' => '感想を入力してください。',
    ];
}
