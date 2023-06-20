@extends('layouts.app')
@section('content')


<div class="content">
    <div class="container">

        <div>
            <h1>
                {{-- {{$project['title']}} --}}
                hello
                @php
                    dd($project)
                @endphp
            </h1>
        </div>

    </div>
</div>
@endsection