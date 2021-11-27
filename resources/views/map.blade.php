<!DOCTYPE html>
<html>
<head>
    <title>Simple Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('../css/map.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('../js/map.js')}}"></script>
</head>
<body>
<div id="map"></div>
<div id="user_id" hidden></div>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjNH2YMbSj7XeMXQDJd4U7BxdzARGjsjA&callback=initMap&v=weekly" async></script>
</body>
</html>
