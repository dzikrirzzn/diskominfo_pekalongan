@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h1>{{ $contentPage->title }}</h1>
    <div>
        {!! nl2br(e($contentPage->content)) !!}
    </div>
</div>
@endsection