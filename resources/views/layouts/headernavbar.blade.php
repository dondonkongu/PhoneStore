<style>
    .navbar {
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        left: 0;
    }

    .nav-link {
        color: #666777;
        font-weight: 500;
        position: relative;
    }

    .nav-link:hover,
    .nav-link.active {
        color: #000;
    }



    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 4px;
        border-radius: 2px;
        background-color: #ccc;
        visibility: hidden;
        transition: 0.3s ease-in-out;

    }

    .nav-link:hover::before,
    .nav-link.active::before {
        visibility: visible;
        width: 100%;
    }
    .nav-item{
        margin: 0 10px;
    }

    @media (max-width: 991px) {
        /* .navbar-toggler{
            position: fixed;
            top:0;
            right: 0;
        
        } */
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var links = document.querySelectorAll('.nav-link');

        links.forEach((link) => {
            if (link.href === window.location.href) {
                link.classList.add("active");
                link.setAttribute("aria-current", "page");
            }
        });
    });
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">DONIX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product') }}">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        @php
                            $categoryList = DB::table('type_product')->get();
                        @endphp
                        @foreach ($categoryList as $item)
                            <li><a class="dropdown-item" href="{{ route('showTypeProduct') }}?id={{ $item->id }}">{{ $item->name }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{ route('showCart') }}">
                        <i class="bi bi-cart3"></i>
                        Giỏ hàng</a>
                </li>
            </ul>
        </div>
        <ul class="nav ml-auto">
            @if (Route::has('login'))
                @auth
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 text-gray-500 dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <a href="{{ route('profile.edit') }}">
                                    {{ __('Thông tin tài khoản') }}
                                </a>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                  this.closest('form').submit();" >
                                        {{ __('Đăng xuất') }}
                                    </a>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <li class="nav-item">
                        <a class="nav-link lg" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link lg" href="{{ route('register') }}">Đăng ký</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>


    </div>
</nav>
