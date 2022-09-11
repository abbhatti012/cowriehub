@extends('pos.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .iti--allow-dropdown{
        width: 100%;
    }
    #google-map {
        margin: 0 auto;
        width: 600px;
        height: 600px;
    }
</style>
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">My Pos Account</a></li>
         </ol>
      </div>
      @if(\App\Models\User::IsPending('pos'))
        <div class="alert alert-danger">
            <p>Cowriehub reviewing your application. You will be notified in your email on the status of your application after this review</p>
        </div>
      @endif
    @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
   @if(!$user)
    <form id="basic-validation" action="{{ route('pos.pos-signup', Auth::id()) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bio Data</h4>
                    </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_email">Company Email</label>
                                    <input type="text" name="company_email" value="{{ old('company_email') }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_phone">Company Phone</label>
                                    <input type="text" name="company_phone" value="{{ old('company_phone') }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="referrel_code">Referrel Code</label>
                                    <input class="form-control form-control-lg" value="{{ old('referrel_code') }}" name="referrel_code"  value="{{ old('referrel_code') }}" type="text" id="referrel_code">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="js-search-input">Landmark Area</label>
                                    <input class="form-control form-control-lg" name="landmark_area" type="text" id="js-search-input">
                                </div>
                            </div>
                        
                            <div class="basic-form">
                                <div class="mb-3 col-md-6">
                                    <input class="form-check-input" type="checkbox" name="is_agree_policy" id="is_agree_policy" value="1" >
                                    <label class="form-check-label" for="is_agree_policy">
                                        I agree to the Default Policy <a href="">(Click to read)</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
    <form id="basic-validation" action="{{ route('pos.pos-signup', $user->user_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Info</h4>
                    </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" value="{{ $user->company_name }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_email">Company Email</label>
                                    <input type="text" name="company_email" value="{{ $user->company_email }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="company_phone">Company Phone</label>
                                    <input type="text" name="company_phone" value="{{ $user->company_phone }}" class="form-control form-control-lg"  required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="referrel_code">Referrel Code</label>
                                    <input class="form-control form-control-lg" value="{{ $user->referrel_code }}" name="referrel_code" type="text"  id="referrel_code">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="js-search-input">Landmark Area</label>
                                    <input class="form-control form-control-lg" name="landmark_area" value="{{ $user->landmark_area }}" type="text" id="js-search-input">
                                </div>
                            </div>
                        
                            <div class="basic-form">
                                <div class="mb-3 col-md-6">
                                    <input class="form-check-input" type="checkbox" name="is_agree_policy" id="is_agree_policy" value="1"<?php if($user->is_agree_policy){echo 'checked';} ?> >
                                    <label class="form-check-label" for="is_agree_policy">
                                        I agree to the Default Policy <a href="">(Click to read)</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
   </div>
   <div id="google-map"></div>
</div>
@endsection
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;libraries=places&key=AIzaSyBeEQgpHcPzV4BwOa60xgE9AwhlofidWh8"></script>
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
@endsection