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
                @foreach($goods as $good)
                    <a href="item/{{ $good->category }}/{{ $good->id }}">{{ $good->goods }} </a>
                @endforeach
            </div>
        </main>
        @include('layouts.footer')
    </div>
@endsection