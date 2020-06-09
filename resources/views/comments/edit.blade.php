@extends('layouts.app')

@section('content')
    <h1>Edit Comment</h1>
    {!! Form::open(['action' => ['CommentsController@update', $comment->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::textarea('body', $comment->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Text'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
