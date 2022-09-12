<!DOCTYPE html>
<html lang="en" class="h-100">

<head>	
	<!-- PAGE TITLE HERE -->
	<title>REGISTER</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" />
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">

</head>
<style>
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }

    input.error {
        border: 1px dashed red;
        font-weight: 300;
        color: red;
    }
    #google-map {
        margin: 0 auto;
        width: 600px;
        height: 600px;
    }

    input {
        display: block;
        width: 100%;
        max-width: 600px;
        height: 30px;
        margin: 20px auto;
    }
    .iti{
        display: block !important;
    }
</style>
@php
    if(isset($_REQUEST['callback']) && !empty($_REQUEST['callback'])){
        Session::put('callback', $_REQUEST['callback']);
    }
@endphp
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                @if (\Session::has('registrationSuccessfull'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('registrationSuccessfull') !!}</li>
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-{{session('message')['type']}}">
                        {{session('message')['text']}}
                    </div>
                @endif
                @if(isset($_REQUEST['role']) && $_REQUEST['role'] == 'pos')
                <div class="col-md-7">
                    @else
                    <div class="col-md-12">
                @endif
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center">
										<a href="{{ url('/') }}"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center">Register your account</h4>
                                    <form id="basic-form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row col-md-12">
                                            <div class="col-md-6">
                                                <label for="name" class="mb-1"><strong>{{ __('Name') }}</strong></label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-1"><strong>Email</strong></label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="col-md-6">
                                                <label for="phone" class="mb-1"><strong>Phone Number</strong></label>
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="+233" required autocomplete="phone" autofocus>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row col-md-12 ">
                                            <div class="col-md-6">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password-confirm" class="mb-1"><strong>Confirm Password</strong></label>

                                                <div class="col-md-12">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-check custom-checkbox ms-1">
                                                <input type="checkbox" class="form-check-input" name="subscribe" id="subscribe">
                                                <label class="form-check-label" for="subscribe">Subscribe to <a href="{{ url('/') }}">COWRIEHUB</a></label> for promos and deals
                                            </div>
                                        </div>
                                        @if(isset($_REQUEST['role']) && $_REQUEST['role'] == 'pos')
                                        <div class="row col-md-12 ">
                                            <div class="col-md-6">
                                                <label for="referrel_code" class="mb-1"><strong>Referral Code</strong></label>

                                                <div class="col-md-12">
                                                    <input id="referrel_code" type="text" class="form-control" name="referrel_code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="js-search-input" class="mb-1"><strong>Landmark Area</strong></label>

                                                <div class="col-md-12">
                                                    <input id="js-search-input" type="text" class="form-control" name="landmark_area" required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 ">
                                            <div class="col-md-4">
                                                <label for="company_name" class="mb-1"><strong>Company Name</strong></label>

                                                <div class="col-md-12">
                                                    <input id="company_name" type="text" class="form-control" name="company_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="company_email" class="mb-1"><strong>Company Email</strong></label>

                                                <div class="col-md-12">
                                                    <input id="company_email" type="email" class="form-control" name="company_email" required >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="company_phone" class="mb-1"><strong>Company Phone</strong></label>

                                                <div class="col-md-12">
                                                    <input id="company_phone" type="text" class="form-control" name="company_phone" required >
                                                </div>
                                            </div>
                                        </div>
                                            <div class="">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" name="is_agree_policy" id="is_agree_policy">
                                                    <label class="form-check-label" for="is_agree_policy">I agree to the Default Policy <a href="{{ url('/') }}">(Click to read)</a></label>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                        </div>
                                        @if(isset($_REQUEST['ref']))
                                        <input type="hidden" name="code" value="{{ $_REQUEST['ref'] }}">
                                        @endif
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    @if(isset($_REQUEST['role']) && $_REQUEST['role'] == 'pos')
                        <div id="google-map"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{asset('admin_assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/custom.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/deznav-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;libraries=places&key=AIzaSyBeEQgpHcPzV4BwOa60xgE9AwhlofidWh8"></script>
</body>
<script>
    $(document).ready(function() {
        $("#basic-form").validate();
    });
</script>
<script>
    $(function () {
    function autocompleteWithEnter(map) {
        // search input
        const searchInput = document.getElementById("js-search-input");
        // options
        const options = {};
        // Google Maps Autocomplete Method
        const autocomplete = new google.maps.places.Autocomplete(
        searchInput,
        options);


        // Store markers in array ready for clearing on update
        let markersArray = [];

        // Has user pressed the down key to navigate autocomplete options?
        let hasDownBeenPressed = false;

        // Default listener outside to stop nested loop returning odd results
        searchInput.addEventListener("keydown", e => {
        if (e.keyCode === 40) {
            hasDownBeenPressed = true;
        }
        });

        // GoogleMaps API custom eventlistener method
        google.maps.event.addDomListener(searchInput, "keydown", e => {
        // Maps API e.stopPropagation();
        e.cancelBubble = true;

        // If enter key, or tab key
        if (e.keyCode === 13 || e.keyCode === 9) {
            // If user isn't navigating using arrows and this hasn't ran yet
            if (!hasDownBeenPressed && !e.hasRanOnce) {
            google.maps.event.trigger(e.target, "keydown", {
                keyCode: 40,
                hasRanOnce: true });

            }
        }
        });

        // place_changed GoogleMaps listener when we do submit
        google.maps.event.addListener(autocomplete, "place_changed", function () {
        // Get the place info from the autocomplete Api
        const place = autocomplete.getPlace();


        //If we can find the place lets go to it
        if (typeof place.address_components !== "undefined") {
            // reset hasDownBeenPressed in case they don't unfocus
            hasDownBeenPressed = false;

            // Get returned location
            const returnedCoords = new google.maps.LatLng(
            place.geometry.location.lat(),
            place.geometry.location.lng());


            const userLocation = {
            lat: place.geometry.location.lat(),
            lng: place.geometry.location.lng() };


            // add a marker
            new google.maps.Marker({
            position: returnedCoords,
            map: map });


            // Focus map on new location
            map.setCenter(returnedCoords);
            map.setZoom(14);
            getRoute(map, userLocation);
        }
        });



        function getRoute(map, coords) {
        const directionsDisplay = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true,
            preserveViewport: false,
            polylineOptions: {
            strokeWeight: 4,
            strokeColor: '#e30613' } });




        const directionsService = new google.maps.DirectionsService();

        // Directions request object packet for the directionsService
        const request = {
            origin: coords,
            travelMode: google.maps.DirectionsTravelMode.DRIVING };


        // Send the directionsService our request and wait for a response while checking the status of it
        directionsService.route(request, (response, status) => {
            c;
            // If the service is loaded properly and returning a response, update the route on our map
            if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            } else {
            // Give us an error if the service isn't responding
            console.warn(status);
            }
        });
        }

        // Clear the input on focus, reset hasDownBeenPressed
        searchInput.addEventListener("focus", () => {
        hasDownBeenPressed = false;
        searchInput.value = "";
        });
    }

    // Default map init
    function initialize() {
        let latitude = 51.509865;
        let longitude = -0.118092;
        let center = new google.maps.LatLng(latitude, longitude);
        const mapOptions = {
        center: center,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP };


        const map = new google.maps.Map(
        document.getElementById("google-map"),
        mapOptions);


        autocompleteWithEnter(map);
    }

        initialize();
    });
</script>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<script src='https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?1549804213570'></script>
<script>
    // International telephone format
    // $("#phone").intlTelInput();
    // get the country data from the plugin
    var countryData = window.intlTelInputGlobals.getCountryData(),
    input = document.querySelector("#phone"),
    addressDropdown = document.querySelector("#address-country");

    // init plugin
    var iti = window.intlTelInput(input, {
    hiddenInput: "full_phone",
    utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js?1549804213570" // just for formatting/placeholders etc
    });

    // populate the country dropdown
    for (var i = 0; i < countryData.length; i++) {
    var country = countryData[i];
    var optionNode = document.createElement("option");
    optionNode.value = country.iso2;
    var textNode = document.createTextNode(country.name);
    optionNode.appendChild(textNode);
    addressDropdown.appendChild(optionNode);
    }
    // set it's initial value
    addressDropdown.value = iti.getSelectedCountryData().iso2;

    // listen to the telephone input for changes
    input.addEventListener('countrychange', function(e) {
    addressDropdown.value = iti.getSelectedCountryData().iso2;
    });

    // listen to the address dropdown for changes
    addressDropdown.addEventListener('change', function() {
    iti.setCountry(this.value);
    });
</script>
</html>