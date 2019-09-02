@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="timeLine">
                <div class="timeLineHeder">
                    @if (Auth::check())
                    <form action="" method="post">
                        <p>タイトル:<input type="text" name="title" id="intitle"></p>
                        <p style="margin: 0;">感想</p>
                        <textarea name="message" id="inmessage" cols="30" rows=""></textarea>
                        <p> <input type="submit" value="投稿"></p>
                    </form>
                    @else
                    <h1>ログインして、感想を書こう！！</h1>
                    <p>(<a href="/Login">ログイン</a>|<a href="/regster">アカウント登録</a>)</p>
                    @endif
                </div>
                <div class="timeLine">
                    <h1>感想のタイムライン</h1>

                </div>
            </div>
        </div>
    </div>
    @endsection
