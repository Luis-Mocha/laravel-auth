@extends('layouts.app')
@section('content')

<div class="jumbotron p-3 mb-4 bg-light rounded-3">
    <div class="container py-5">

        <h1 class="display-5 fw-bold">
            Project List
        </h1>

        <a href="{{ route('admin.projects.create') }}">
            <button class="btn btn-primary mt-3">
                Create Project
            </button>
        </a>
    </div>
</div>

<div class="content">
    <div class="container mb-4">

        {{-- messaggio in caso di successo creazione fumetto --}}
        @if (Session::has('success') )
            <div class="alert bg-primary text-center text-light">
                {!! Session::get('success') !!}
            </div>
        @endif

        <div class="card-container">
            @forelse ($projects as $elem)

                <div class="project-card p-3 mt-2 border rounded d-flex justify-content-between align-items-center">

                    <div class="fs-3">{{$elem['title']}}</div>

                    <div>
                        <button class="btn btn-warning">
                            <a href="{{route ('admin.projects.edit', $elem) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </button>

                        {{-- bottone delete --}}
                        <form action=" {{ route('admin.projects.destroy', $elem) }} " method="POST" class="d-inline-block">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger ms-2">
                                <a href="">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </button>
                        </form>
                    </div>
                </div>
            
            @empty
                <h2 class="text-center">Al momento non ci sono progetti</h2>
            @endforelse
        </div>

    </div>
</div>
@endsection