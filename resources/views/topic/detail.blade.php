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
        @if ($topic->link==null)
        <h1>{{ $topic->title }}</h1>
        @else
        <h1><a href="{{ $topic->link->link }}" target="_blank">{{ $topic->title }}</a></h1>
        @endif
        <div class="data clearfix">
          <div class="name clearfix"><i class="fa fa-user fa-fw" aria-hidden="true"></i> {{ $topic->user->name }}</div>
          <div class="date"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{ $topic->created_at }}</div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="main">
        <p class="body">{!! nl2br(e($topic->body)) !!}</p>
        <div class="btn-like-wrap clearfix">
          <form id="btn-like-wrap">
            <like-btn></like-btn>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/x-template" id="like-btn">
    <div>
    <button type="button" class="btn btn-secondary btn-like" v-on:click="submit"><i class="fa fa-thumbs-o-up fa-fw" aria-hidden="true"></i> いいね！</button>
    <div class="balloon"><p>{{ $topic->likes->count() }}</p></div>
</div>
  </script>
  <input type="hidden" name="topic_id" id="topic_id" value="{{ $topic->id }}">
</div>
@endsection
