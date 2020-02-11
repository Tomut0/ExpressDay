<header>
    <nav class="navbar navbar-expand-xl">
        <a href="{{ url('/') }}" class="navbar-brand text-dark">ExpressDay
            <span class="w-100"></span>
        </a>
        <form class="form-inline mx-auto w-50">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2 w-100" type="search" id="search" placeholder="Найти" aria-label="Search">
        </form>
        <ul class="navbar-nav mr-auto">
            @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{ Auth::user()->balance.'Р' }}
                        <img src="/resources/img/wallet.svg" class="wallet" alt="wallet"></a>
                </li>
                @endauth
            @endif
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                    <img src="/resources/img/cart.svg" alt="cart">
                    Корзина
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                </div>
            </li>
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