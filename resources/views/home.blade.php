@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                        <a href="/posts/create" class="btn btn-primary">Create Post</a>

                        {!! Form::open(['action' => 'UserController@update_avatar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                            <div class="form-group">
                                {{Form::file('avatar_image')}}
                            </div>

                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

                        {!! Form::close() !!}

                        <h2>Your posts</h2>
                        @if(count($posts) > 0)
                            <table class='table table-striped'>
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <th>{{$post->title}}</th>
                                        <td><a href="/posts/{{$post->id}}" class="btn btn-default">Go to</a> 
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @else
                            <p>You don't have any created posts</p>
                        @endif
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
