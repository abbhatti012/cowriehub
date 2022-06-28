@extends('app')
@section('content')
@endsection
@section('scripts')
    <script>
        // Retrieve Firebase Messaging object.
        const messaging = firebase.messaging();
        // Add the public key generated from the console here.
        messaging.usePublicVapidKey("BFlNei6G_Awoq45GEMPHcmlqGtOlCOFzuyQL8iFL_vUrOCmBCxRI6BugeILB0SvyOxHAQePzJRyhZGTLWyJK29Q");
        // messaging.usePublicVapidKey("AIzaSyD9XKCkBT-tcSUyooN4ts4zCbC96KH_6qI");


        function sendTokenToServer(fcm_token) {
            const user_id = 1;
            axios.post('/api/save-token', {
                fcm_token, user_id
            })
                .then(res => {
                    console.log(res);
                })

        }

        function retreiveToken(){
            messaging.getToken().then((currentToken) => {
                if (currentToken) {
                    sendTokenToServer(currentToken);
                    // updateUIForPushEnabled(currentToken);
                } else {
                    // Show permission request.
                    //console.log('No Instance ID token available. Request permission to generate one.');
                    // Show permission UI.
                    //updateUIForPushPermissionRequired();
                    //etTokenSentToServer(false);
                    alert('You should allow notification!');
                }
            }).catch((err) => {
                console.log(err.message);
                // showToken('Error retrieving Instance ID token. ', err);
                // setTokenSentToServer(false);
            });
        }
        retreiveToken();
        messaging.onTokenRefresh(()=>{
            retreiveToken();
        });

        messaging.onMessage((payload)=>{
            console.log('Message received');
            console.log(payload);

            location.reload();
        });

    </script>
@endsection