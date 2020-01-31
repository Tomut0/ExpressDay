<?php
use App\User;

?>
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
                <p>{{ $good->goods }}</p>
                <p>{{ $category }}</p>
                <p>{{ $good->description }}</p>
                @if (Route::has('login'))
                    @auth
                        <form action="{{ Route::currentRouteName() }}" method="POST">
                            @csrf
                            <button type="submit" name="cart">Добавить товар в корзину</button>
                        </form>
                    @endauth
                @endif
                <?php
                if (isset($_POST["cart"])) {
                    $result = User::addCart("$good->id");
                }
                ?>
            </div>
        </main>
        @include('layouts.footer')
    </div>
@endsection