<head>
<script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
</head>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-analytics.js";
    import firebase from 'firebase/app';
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyD9XKCkBT-tcSUyooN4ts4zCbC96KH_6qI",
        authDomain: "chat-in-cowriehub.firebaseapp.com",
        projectId: "chat-in-cowriehub",
        storageBucket: "chat-in-cowriehub.appspot.com",
        messagingSenderId: "157065088469",
        appId: "1:157065088469:web:becb065aa9d1dcf88bc15c",
        measurementId: "G-QE267NW1M0"
    };

    // Initialize Firebase
    const app = firebase.initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
</script>
@yield('content')

@yield('scripts')