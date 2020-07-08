@extends('layouts.app')
@section('content')
<div class="container">
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
            @foreach ($posts as $key=>$value)
              <tr>
                <td>
                  <li>
                    <p>
                      <td>{{$posts[$key]->user->name}}</td>
                      <br>
                      <td><b>{{ $posts[$key]->title.": " }}</b></td>
                      <td>{{ $posts[$key]->body }}</td>
                      <br>
                      <small><em>{{ $posts[$key]->updated_at }}</em></small>
                      @if ($posts[$key]->user_id==Auth::user()->id)
                      <div style="align:right; float:left; clear:none">
                        <a href="{{route('edit', $posts[$key]->id)}}" class="btn btn-info">Edit</a>
                      </div>
                      <div >
                        <a href="{{route('destroy', $posts[$key]->id)}}" class="btn btn-danger">Delete</a>
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
