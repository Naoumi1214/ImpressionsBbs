<?php

namespace App;

use Dotenv\Validator;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    protected $table = 'articles';

    protected $guarded = array('id');

    public static $rules = [
        'title' => 'required',
        'message' => 'required',
    ];

    public static $messages = [
        'title.required' => 'タイトルを入力してください。',
        'message.required' => '感想を入力してください。',
    ];
}
