@extends('layouts.html')

@section('link','/resources/sass/custom.css')
@section('title', 'ExpressDay')
@section('content')
    <div class="container-xl bg-white min-vh-100">
        @include('layouts.nav')
        <main>
            <div class="jumbotron jumbotron-fluid">
                <div class="container"></div>
            </div>
            <div class="container-xl">
                @if(!$filtered_good || !$filtered_good->toArray())
                    <p> Товаров не найдено.</p>
                @elseif($filtered_good.gettype("object"))
                    <div class="row row-cols-1 row-cols-md-3">
                    @foreach($filtered_good as $good)
                            <div class="col mb-4">
                                <div class="card h-100">
                                    <a href="./{{ $good->category }}/{{ $good->id }}" class="h-100 d-flex flex-column">
                                        <img src="{{ $good->img }}" class="card-img-top" alt="{{ $good->name }}">
                                        <div class="card-body d-flex justify-content-end flex-column">
                                            <h5 class="card-title">{{ $good->name }}</h5>
                                            <p class="card-text">{{ $good->description }}</p>
                                            <p class="card-text"><small class="text-muted float-right"><i class="fas fa-eye"></i> {{ $good->views }} </small></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </main>
    </div>
    @include('layouts.footer')
@endsection