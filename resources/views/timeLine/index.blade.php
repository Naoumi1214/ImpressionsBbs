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
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                        <p id="titleError"></p>
                        <p>タイトル:<input type="text" name="title" id="intitle"></p>
                        <p id="messageError"></p>
                        <p style="margin: 0;">感想</p>
                        <textarea name="message" id="inmessage" cols="30" rows=""></textarea>
                        <p> <input type="button" value="投稿" id="insubmit"></p>
                    </form>
                    @else
                    <h1>ログインして、感想を書こう！！</h1>
                    <p>(<a href="/login">ログイン</a>|<a href="/register">アカウント登録</a>)</p>
                    @endif
                </div>
                <h1>感想のタイムライン</h1>
                <div id="timeLine">
                    @foreach ($articleItems as $item)
                    <article>
                        <h3>タイトル：{{$item->title}}</h3>
                        <p>{{$item->message}}</p>
                    </article>
                    @endforeach
                </div>
                {{$articleItems->appends(['sort' => $sortTarget])->links()}}
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{ asset('js/postArticle/inAriticle.js') }}"></script>
    @endsection
