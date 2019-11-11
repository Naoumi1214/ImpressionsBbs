@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="timeLine">
                <div class="timeLineHeder">
                    <h1>マイユーザーページ({{$user->name}}様)</h1>
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
                </div>
                <h1>感想のタイムライン</h1>
                <div id="timeLine">
                    @foreach ($articleItems as $item)
                    <article id="{{$item->id}}">
                        <h3>タイトル：{{$item->title}}</h3>
                        <p>{{$item->message}}</p>
                        <form action="/deleteMyArticle" method="post">
                            @csrf
                            <input type="hidden" name="article_id" id="article_id" value="{{$item->id}}">
                            <p><input type="button" value="削除する" id="deleteMyArticleButton"></p>
                        </form>
                        @include('timeLine.components.articlesupdate', ['item' => $item])
                    </article>
                    @endforeach
                </div>
                {{$articleItems->appends(['sort' => $sortTarget])->links()}}
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{ asset('js/postArticle/deleteAritcle.js') }}"></script>
    <script src="{{ asset('js/postArticle/inAriticle.js') }}"></script>
    <script>
        $('#modelId').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // モーダル切替えボタン
        var recipient = button.data('whatever'); // data-* 属性から情報を抽出
        // 必要に応じて、ここでAJAXリクエストを開始可能（コールバックで更新することも可能）
        // モーダルの内容を更新。ここではjQueryを使用するが、代わりにデータ・バインディング・ライブラリまたは他のメソッドを使用することも可能
        var modal = $(this);
        modal.find('.modal-title').text(recipient + 'にメッセージを送信');
        modal.find('.modal-body input').val(recipient)});
    </script>
    @endsection
