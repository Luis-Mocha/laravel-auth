@extends('layouts.app')
@section('content')

<div class="jumbotron p-3 mb-4 bg-light rounded-3">
    <div class="container py-5">

        <h1 class="display-5 fw-bold">
            Explore my projects
        </h1>
    </div>
</div>

<div class="content">
    <div class="container">

        <div class="card-container row mb-5">
            @forelse ($projects as $elem)

                <div class="project-card p-3 col-6 col-md-4 col-lg-3 g-3 border rounded">

                    <a href="{{ route('projects.show' , $elem->slug ) }}" class="h-100 d-flex flex-column justify-content-between">

                        <img src="{{ asset('storage/' . $elem->cover_img) }}" class="img-fluid" alt="...">

                        <div class="fs-3">{{$elem['title']}}</div>

                    </a>

                </div>
            
            @empty
                <h2 class="text-center">Al momento non ci sono progetti</h2>
            @endforelse
        </div>

    </div>
</div>
@endsection