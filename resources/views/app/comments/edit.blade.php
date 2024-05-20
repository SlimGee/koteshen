@extends('app')

@section('content')
    @include('app.comments._form', ['comment' => $comment, 'commentable' => $commentable])
@endsection
