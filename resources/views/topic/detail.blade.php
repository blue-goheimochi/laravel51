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
      </div>
    </div>
  </div>
</div>
@endsection
