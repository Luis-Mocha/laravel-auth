@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">

        <h1 class="display-5 fw-bold">
            Project List
        </h1>
    </div>
</div>

<div class="content">
    <div class="container mb-4">

        <div class="card-container">
            @forelse ($projects as $elem)

                <div class="project-card p-3 mt-2 border rounded d-flex flex-column justify-content-between">
                    <div class="fs-3">{{$elem['title']}}</div>
                </div>
            
            @empty
                <h2 class="text-center">Al momento non ci sono progetti</h2>
            @endforelse
        </div>

    </div>
</div>
@endsection