@extends('layouts.app')
@section('content')


<div class="content">
    <div class="container">

        <div class="my-5">
            <img src="{{ asset('storage/' . $project->cover_img) }}" class="img-fluid" alt="...">
            <h1>
                {{$project['title']}}
            </h1>
            <span>Descrizione progetto: </span>
            <p>
                {{$project['description']}}
            </p>
            <a href="{{$project['link_project']}}" target="_blank" rel="noopener noreferrer" class="text-primary">Link al progetto</a>
        </div>

    </div>
</div>
@endsection