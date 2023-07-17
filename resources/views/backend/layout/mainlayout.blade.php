<!DOCTYPE html>

<html lang="en">

 <head>

   @include('backend.layout.partials.head')

 </head>

 <body>
    @include('backend.layout.partials.header')

    @include('backend.layout.partials.sidebar')
    
    
<main id="main" class="main">

    @yield('content')
</main>

    @include('backend.layout.partials.footer')

    @include('backend.layout.partials.footer-scripts')

 </body>

</html>