<!DOCTYPE html>
<html lang="en">

<head>
    <div class="container-xxl bg-white p-0">
    @include('frontend.partials.head')
    @include('frontend.partials.header')
    </div>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header Start -->
        @include('frontend.partials.services')
        <!-- Header End -->
        
        <!-- Footer Start -->
        @include('frontend.partials.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
    </div>

    {{-- @include('frontend.partials.javascripts') --}}
</body>

</html>
