<header class="header">
    <div class="container">
        <nav class="nav">
            <a href="{{ route('page.home') }}">Home</a>
            <a href="{{ route('page.allProducts') }}">Products</a>
            <a href="{{ route('cart.index') }}">Cart</a>
            @guest()
                <a href="{{ route('page.login') }}">Sign-in</a>
                <a href="{{ route('page.register') }}">Sign-up</a>
            @endguest
            @auth()
                <a href="">Profile</a>
                <a href="{{ route('auth.logoutUser') }}">log Out</a>
            @endauth
        </nav>
    </div>
</header>
