@extends('layouts.app')

@section('content')

        <a href="/posts" class="btn btn-default"><-Back</a>
    <h1>{{$post->title}}</h1>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <br><br>
    <div>
        <h3>{!!$post->body!!}</h3>
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif

    <br>

    <h1>Comments</h1>
    <br><br>

    @if(count($post->comments) > 0)
                @foreach ($post->comments as $comment)
                    <div class="well">
                        <div class="row">
                            <div class="col-sm-2">
                                <img class="img-thumbnail" src="/storage/avatar_images/{{$comment->user->avatar_image}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"> {{-- PLACEHOLDER FOR PROFILE PIC --}}  
                            </div>
                            <div class="col-sm-8">
                                <span class = "border border-primary"><h3><b>{{$comment->user->name}}</b></h3></span>
                                <h4>{!!$comment->body!!}</h4>
                                <small>Written on {{$comment->created_at}}</small>
                            </div>
                            <div class="col-sm-2">
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $comment->user_id)
                                        <a href="/comments/{{$comment->id}}/edit" class="btn btn-info">Edit</a>

                                        {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
        @else
            <h3>No comments found</h3>
        @endif

    <br><br>

    @if(!Auth::guest())
        {!! Form::open(['action' => ['CommentsController@store'], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::hidden('post_id', $post->id)}}
            {{Form::label('body', 'Comment this post')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Text'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        @else
        <p><span style="color:rgb(255, 0, 0)">Create an account to be able to comment this post</span></p>
    @endif

    <br><br>

    }
    
@endsection
