@extends('layouts.html')

@section('link','/resources/sass/custom.css')
@section('title', 'ExpressDay')
@section('content')
    <div class="container-xl bg-white vh-100">
        @include('layouts.nav')
        <main>
            <div class="jumbotron jumbotron-fluid">
                <div class="container"></div>
            </div>
            <div class="container-xl">
                @if(!$filtered_good)
                    <p> Товаров не найдено.</p>
                @elseif($filtered_good.gettype("object"))

                    @foreach($filtered_good as $good)
                        <a href="./{{ $good->category }}/{{ $good->id }}">{{ $good->goods }} </a>
                        <br>
                    @endforeach
                @endif
            </div>
        </main>
        @include('layouts.footer')
    </div>
@endsection