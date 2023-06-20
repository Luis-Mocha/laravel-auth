@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">

        <h1 class="display-5 fw-bold">
            Creazione di un nuovo progetto
        </h1>
    </div>
</div>

<div class="content">
    <div class="container mb-4">

        <form action=" {{ route('admin.projects.store') }} " method="POST" class="row" autocomplete="off">

            @csrf

            <div class="form-group mt-3">
                <label for="input-title" class="form-label">Title:</label>
                <input type="text" id="input-title" class="form-control" name="title" placeholder="Inserisci il titolo" required value="{{ old('title') }}"> 
            </div>
            {{-- erorre validazione --}}
            @error('title')
                <div class="alert alert-warning py-1 m-0 fst-italic">{{ $message }}</div>
            @enderror

            <div class="form-group mt-3 ">
                <label for="input-description" class="form-label">Description:</label>
                <textarea id="input-description" class="form-control" name="description" cols="30" rows="5">{{ old('description') }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="input-link_project" class="form-label">Link Progetto:</label>
                <input type="text" id="input-link_project" class="form-control" name="link_project" placeholder="Inserisci la serie di appartenenza" required value="{{ old('link_project') }}"> 
            </div>        
            
            <div>
                <button type="submit" class="btn btn-primary my-4 col-2 d-block mx-auto">
                    create Project
                </button>
            </div>

            

        </form>

    </div>
</div>
@endsection