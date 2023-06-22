@extends('layouts.app')
@section('content')


<div class="guestIndexContent">

    <div class="page-hero">

        <h1 class="type" style="--n:15;">My projects</h1>

        <div class="projects-presentation">
            <p>
                Benvenuti nella sezione dedicata ai miei progetti.
                <br>
                Ogni progetto è il frutto di passione, creatività e impegno.
                <hr>
                In questa sezione troverete una selezione dei miei progetti più significativi. Ogni progetto è stato sviluppato con cura, tenendo conto delle esigenze e dei desideri dei clienti, e mi ha permesso di ampliare le mie competenze e di affinare la mia abilità nel creare esperienze digitali coinvolgenti e funzionali.
                <hr>
                Vi invito a esplorare questa sezione dedicata ai miei progetti, nella quale troverete descrizioni dettagliate, immagini e, quando possibile, i link per visualizzare i siti web in azione. Spero che vi ispirino e vi offrano un'idea chiara delle mie competenze e della mia passione per lo sviluppo web.
            </p>
        </div>

        {{-- bottone link --}}
        <a href="#card-section">
            <button>
                <i class="fa-solid fa-angles-down"></i>
            </button>
        </a>

    </div>

    <div class="container">

        <div id="card-section" class="card-container">
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