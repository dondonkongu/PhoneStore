<style>
     .header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
        }

        .logo {
            float: left;
        }

        .logo img {
            height: 40px;
            vertical-align: middle;
        }

        .brand {
            margin-left: 10px;
            font-size: 20px;
            font-weight: bold;
            vertical-align: middle;
        }

        .user-links {
            float: right;
        }

        .user-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }
    </style>



<div class="header">
    <div class="logo">
        <a class="navbar-brand" href="{{ route('adminDashboard') }}">Admin Dashboard</a>
    </div>
    <div class="user-links">
        <a href="{{ route('profile.edit') }}">My Account</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="route('logout')"
                onclick="event.preventDefault();
                          this.closest('form').submit();" >
                {{ __('Đăng xuất') }}
            </a>
        </form>
        </div>
</div>