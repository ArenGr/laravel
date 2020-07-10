@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card">
          <div class="card-header ml-5 mr-5">Edit post</div>
          <div class="card-body">
            <form method="post" action="{{route('update')}}">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="titleid" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                  <input name="title" type="text" value="{{$post->title}}" class="form-control" id="titleid" placeholder="Title">
                </div>
              </div>
              <div class="form-group row">
                <label for="posted" class="col-sm-3 col-form-label">Post</label>
                <div class="col-sm-9">
                  <input id="posted" name="post" value="{{$post->body}}" class="form-control" placeholder="Write your post ..." rows="1" cols="50"/>
                </div>
              </div>
              <div align="center">
                <input type="hidden" value="{{$post->id}}" name="post_id"/>
                <input type="submit" id="sended" class="btn btn-success" name="save_btn" value="Save" width="2%"/>
              </div>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div><br />
            @endif
          </div>
        </div>
