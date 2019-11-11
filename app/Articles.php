<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
     * 指定の記事を削除する
     */
    public static function deleteArticle(int $deleteArticle_id): bool
    {
        # code...
        try {
            //code...
            DB::delete('DELETE FROM articles
        WHERE id = ?', [$deleteArticle_id]);
            return true;
        } catch (\Throwable $th) {
            //throw $th
            return false;
        }
    }

    public static function updateArticle(int $updateArticle_id, string $updateMessage)
    {
        # code...
        DB::update(
            'UPDATE articles SET message = ?
            WHERE id  = ?',
            [$updateMessage, $updateArticle_id]
        );
    }
}
