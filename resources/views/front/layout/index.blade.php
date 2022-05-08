<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home v1 | Bookworm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/slick-carousel/slick/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>
<body>
@include('front.layout.header')

@yield('content')

@include('front.layout.footer')

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<!-- <script src="{{asset('admin_assets/js/student-global.js')}}"></script> -->
    
<script src="{{asset('assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/vendor/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js')}}"></script>
<script src="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/js/hs.core.js')}}"></script>
<script src="{{asset('assets/js/components/hs.unfold.js')}}"></script>
<script src="{{asset('assets/js/components/hs.malihu-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/components/hs.header.js')}}"></script>
<script src="{{asset('assets/js/components/hs.slick-carousel.js')}}"></script>
<script src="{{asset('assets/js/components/hs.selectpicker.js')}}"></script>
<script src="{{asset('assets/js/components/hs.show-animation.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JS Bookworm -->
    <!-- <script src="../../assets/js/bookworm.js"></script> -->
    <script>
        $(document).on('ready', function() {
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // init zeynepjs
            var zeynep = $('.zeynep').zeynep({
                onClosed: function() {
                    // enable main wrapper element clicks on any its children element
                    $("body main").attr("style", "");

                    console.log('the side menu is closed.');
                },
                onOpened: function() {
                    // disable main wrapper element clicks on any its children element
                    $("body main").attr("style", "pointer-events: none;");

                    console.log('the side menu is opened.');
                }
            });

            // handle zeynep overlay click
            $(".zeynep-overlay").click(function() {
                zeynep.close();
            });

            // open side menu if the button is clicked
            $(".cat-menu").click(function() {
                if ($("html").hasClass("zeynep-opened")) {
                    zeynep.close();
                } else {
                    zeynep.open();
                }
            });
        });
    </script>
@yield('scripts')
<script src="//code.tidio.co/wa0smygsidvita41rbcfrurkda8guxqc.js" async></script>
@if(Session::has('payment_cancelled'))
<script>
    $.notify("Your Payment has been cancelled!");
</script>
@endif
</body>
</html>
