@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">

        <h1 class="display-5 fw-bold">
            My projects
        </h1>
    </div>
</div>

<div class="content">
    <div class="container">

        <div class="card-container row mb-5">
            @forelse ($projects as $elem)

                <div class="project-card p-3 col-6 col-md-4 col-lg-3 g-3 border rounded d-flex flex-column justify-content-between">
                    <a href="{{ route('projectsGuestShow' , ['id' => $elem->id] ) }}">
                        <img src="https://media.istockphoto.com/id/1033918582/vector/setting-gear-tool-cog-isolated-flat-web-mobile-icon-vector-sign-symbol-button-element.jpg?s=612x612&w=0&k=20&c=3foI6MrLv042faO8w8vLoNb3AedZzRVBphIyjdDSprw=" style="max-width: 100px" class="card-img-top w-100" alt="...">
                    </a>
                    <div class="d-flex flex-column justify-content-between">
                        <div class="fs-3">{{$elem['title']}}</div>
                        
                        <a href="{{$elem['link_project']}}" target="_blank" rel="noopener noreferrer" class="d-block text-end">Link progetto</a>
                    </div>
                </div>
            
            @empty
                <h2 class="text-center">Al momento non ci sono progetti</h2>
            @endforelse
        </div>

    </div>
</div>
@endsection