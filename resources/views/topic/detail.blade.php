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
          <button type="button" class="btn btn-secondary btn-like"><i class="fa fa-thumbs-o-up fa-fw" aria-hidden="true"></i> いいね！</button>
          <div class="balloon"><p>{{ $topic->likes->count() }}</p></div>
        </div>
      </div>
    </div>
    <form action="/topic/like" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="topic_id" value="">
    <input type="submit" value="submit">
    </form>
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  </div>
</div>
@endsection
