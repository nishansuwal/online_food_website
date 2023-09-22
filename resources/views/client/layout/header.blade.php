<div class="sticky">
    <div class="main-header" id="myHeader">
        <div class="logo">
            <h1>FOODER</h1>
        </div>
        <div class="navigation">
            <a href="/">Home</a>
            <a href="/">Contact Us</a>
            <a href="/">Products</a>
            <a href="/">About Us</a>

            @if (Auth::check())
                 <a href="/cart">Cart</a>

                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @else
                <a href="/login">Login</a>
            @endif
        </div>
        <div class="search-container">
            <form method="get" action="/">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
