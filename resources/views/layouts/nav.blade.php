
<header>
    <nav class="navbar navbar-expand-xl">
        <a href="{{ url('/') }}" class="navbar-brand text-dark">ExpressDay
            <span class="w-100"></span>
        </a>
        <form class="form-inline mx-auto w-50">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2 w-100" type="search" id="search" placeholder="Найти" aria-label="Search">
        </form>
        <ul class="navbar-nav">
            @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{ Auth::user()->balance.'Р' }}
                        <img src="/resources/img/wallet.svg" class="wallet" alt="wallet"></a>
                </li>
                @endauth
            @endif
                @if (Route::has('login'))
                    @auth
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                    <img src="/resources/img/cart.svg" alt="cart">
                    Корзина
                </a>

                <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                    <div class="card-desk">
                    @foreach($cartlist as $good)
                        <div class="card mt-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-2 mx-3 my-3 d-flex justify-content-center align-items-center">
                                    <img src="{{$good->img}}" class="card-img" alt="{{ $good->name }}">
                                </div>
                                <div class="col-md-3 mx-3 d-flex justify-content-center align-items-center text-center">
                                    <div class="card-body p-0">
                                        <h5 class="card-title">{{$good->name}}</h5>
{{--                                        <p class="card-text">{{}}</p>--}}
{{--                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex justify-content-center align-items-center">
                                    <p class="card-text">{{$good->price}}Р</p>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center align-items-center">
                                    <p class="card-text">
                                    <form action="?" method="GET">
                                       <i class="fas fa-times"></i>
                                    </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </li>
                    @endauth
                @endif
            <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="nav-link"><img src="/resources/img/user.svg" alt="user">Профиль</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link"><img src="/resources/img/user.svg" alt="user">Войти</a>
                    @endauth
                @endif
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-expand-xl">
        <ul class="navbar-nav d-flex justify-content-around w-100">
            <li class="nav-item">
                <a href="{{ url('/item/electronic') }}" class="nav-link" data-category="electronic">Электроника</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/item/house') }}" class="nav-link" data-category="house">Для дома</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/item/clothers') }}" class="nav-link" data-category="clothers">Одежда</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/item/sport') }}" class="nav-link" data-category="sport">Спорт</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/item/computers') }}" class="nav-link" data-category="computers">Комьютерная техника</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/item/childrens') }}" class="nav-link" data-category="childrens">Для детей</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/item/smartphones') }}" class="nav-link" data-category="smartphones">Смартфоны и аксессуары</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/item/car') }}" class="nav-link" data-category="car">Автотовары</a>
            </li>
        </ul>
    </nav>
</header>

