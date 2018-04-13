<!DOCTYPE html>

@include('layouts.header')
@include('layouts.nav')
@include('layouts.sidebar')
@include('layouts.footer')


<html lang="{{ app()->getLocale() }}">
    @yield('header')
    <body>
        <div id="app">
            
            @unless (!Auth::user())
            @yield('navigation')
            @yield('sidebar')
            @endunless
 
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
    @yield('footer')
</html>
