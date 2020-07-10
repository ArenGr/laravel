@extends('layouts.app')
@section('content')
<div class="container">
  <div class="wrap">
    <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search">Search</i>
      </button>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card">
          <div class="card-header ml-5 mr-5">Add a post</div>
          <div class="card-body">
            <form method="post" action="{{route('post')}}">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="titleid" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                  <input name="title" type="text" class="form-control" id="titleid" placeholder="Title">
                </div>
              </div>
              <div class="form-group row">
                <label for="posted" class="col-sm-3 col-form-label">Post</label>
                <div class="col-sm-9">
                  <textarea id="posted" name="post" class="form-control" placeholder="Write your post ..." rows="1" cols="50"></textarea>
                </div>
              </div>
              <input type="submit" id="sended" class="form-control" name="post_button" value="send" width="2%"/>
            </form>
          </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
        @endif
        <div class="card-header ml-5 mr-5">{{ __('Posts history') }}</div>
        <div class="container-fluid">
          <ul class="list-unstyled">
            @foreach ($posts as $post)
            <tr>
              <td>
                <li>
                  <p>
                    <td>{{$post->user->name}}</td>
                    <br>
                    <td><b>{{ $post->title.": " }}</b></td>
                    <td>{{ $post->body }}</td>
                    <br>
                    <small><em>{{ $post->updated_at }}</em></small>
                    @if ($post->user_id==Auth::user()->id)
                    <div style="align:right; float:left; clear:none">
                      <a href="{{route('edit', $post->id)}}" class="btn btn-info">Edit</a>
                    </div>
                    <div >
                      <a href="{{route('destroy', $post->id)}}" class="btn btn-danger">Delete</a>
                    </div>
                    @endif
                    <hr>
                  </p>
                </li>
              </td>
            </tr>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
