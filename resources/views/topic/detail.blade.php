@extends('layouts.master')

@section('pageTitle', str_limit(e($topic->title, 20)))
@section('pageDescription', str_limit(e($topic->body), 120))
@section('pageId', 'topic-detail')

@section('container')
<div class="container">
  <div class="row">
    @if (session('status'))
      <div class="alert alert-success alert-dismissible fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('status') }}
      </div>
    @endif
    <div class="col-md-12">
      <div class="title-area">
        <h1>{{ $topic->title }}</h1>
        <div class="data clearfix">
          <div class="name clearfix"><i class="fa fa-user fa-fw" aria-hidden="true"></i> {{ $topic->user->name }}</div>
          <div class="date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{ $topic->created_at }}</div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="main">
        <p class="body">{!! nl2br(e($topic->body)) !!}</p>
        <div class="btn-like-wrap clearfix" id="btn-like-wrap">
          <btn-like count="{{ $topic->likes->count() }}" topic="{{ $topic->id }}" like="{{ $isLiked }}"></btn-like>
        </div>
        <div class="comment-area">
          <div class="title">コメント</div>
          <div class="comment-wrap" id="comment-wrap">
            @foreach($topic->comments as $comment)
            <div class="comment clearfix" id="comment{{ $comment->id }}">
              <div class="user">
                <div class="name">{{ $comment->user->name }}</div>
              </div>
              <div class="body">
                <div class="text">{!! nl2br(e($comment->body)) !!}</div>
                <div class="date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>{{ $comment->created_at }}</div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="new-comments-wrap" id="new-comments-wrap">
            <topic-comment></topic-comment>
          </div>
          @if (auth()->guest())
          <div class="comment_no_login"><p class="text-center">コメントするには<a href="/login">ログイン</a>してください</p></div>
          @else
          <div class="comment-post" id="comment-post">
            <form>
              <div class="comment clearfix">
                <div class="user">
                  <div class="name">{{ auth()->user()->name }}</div>
                  <input type="hidden" name="comment-user-name" id="comment-user-name" value="{{ auth()->user()->name }}">
                </div>
                <div class="body">
                  <div class="text clearfix">
                    <textarea id="comment-body"></textarea>
                    <div class="alert alert-danger alert-dismissible" style="display: none;" id="comment-error">
                      <span id="comment-error-message"></span>
                    </div>
                    <button class="btn btn-primary btn-submit" type="button" id="btn-comment">コメント</button>
                  </div>
                </div>
              </div>
              <input type="hidden" id="topic-id" value="{{ $topic->id }}">
            </form>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
