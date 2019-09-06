@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="timeLine">
                <div class="timeLineHeder">
                    @if (Auth::check())
                    {{-- 感想を書くフォーム --}}
                    <form action="/inArticle" method="post">
                        @csrf
                        @if ($errors->has('title'))
                        <p>*タイトルを入力してください。</p>
                        @endif
                        <p>タイトル:<input type="text" name="title" id="intitle"></p>
                        @if ($errors->has('message'))
                        <p>*感想を入力してください。</p>
                        @endif
                        <p style="margin: 0;">感想</p>
                        <textarea name="message" id="inmessage" cols="30" rows=""></textarea>
                        <p> <input type="button" value="投稿" id="insubmit"></p>
                    </form>
                    @else
                    <h1>ログインして、感想を書こう！！</h1>
                    <p>(<a href="/login">ログイン</a>|<a href="/regster">アカウント登録</a>)</p>
                    @endif
                </div>
                <div class="timeLine">
                    <h1>感想のタイムライン</h1>
                    @isset($as)
                    <p>{{$as}}</p>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{ asset('js/postArticle/inAriticle.js') }}"></script>
    @endsection
