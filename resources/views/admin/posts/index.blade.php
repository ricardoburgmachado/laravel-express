

@extends('template')

@section('content')

    <h1>Blog Admin</h1>


    <a href="{{ route('admin.posts.create') }}" class="bt-success">Create new POst</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>

        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id  }}</td>
            <td>{{ $post->title  }}</td>
            <td>
                <a href="{{route('admin.posts.edit', ['id'=>$post->id])}}" class="bt-default">Edit</a>
                <a href="{{route('admin.posts.destroy', ['id'=>$post->id])}}" class="bt-danger">Destroy</a>
            </td>
        </tr>
        @endforeach



    </table>

    {!! $posts->render() !!}





@endsection