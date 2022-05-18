@extends('frontend.layouts.layout')
@section('content')
<div id='overlay' class='d-none'>
    <div class='col-12 text-center'>
        <img src='/resources/images/searching.gif'>
    </div>
    <div class='col-12 text-center'>
        <h4>Your location is being searched...</h4>
    </div>
</div>
<h3 class='d-none'>Here is your data:</h3>
<table class='table-bordered table-responsive-lg col-lg-12 d-none' cellpadding='5'>
    <thead>
        <tr>
            <td colspan="2">Your geolocation details:</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID:</td>
            <td id='id'></td>
        </tr>
        <tr>
            <td>Timestamp:</td>
            <td id='timestamp'></td>
        </tr>
        <tr>
            <td>IP:</td>
            <td id='ip'>{{$ip}}</td>
        </tr>
        <tr>
            <td>Latitude:</td>
            <td id='latitude'></td>
        </tr>
        <tr>
            <td>Longitude:</td>
            <td id='longitude'></td>
        </tr>
        <tr>
            <td>Country:</td>
            <td id='country'></td>
        </tr>
        <tr>
            <td>Region:</td>
            <td id='region'></td>
        </tr>
        <tr>
            <td>City:</td>
            <td id='city'></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center"><a href="" id="link" target="_blank">See map</a></td>
        </tr>
    </tbody>
</table>
@stop
@section('aditionaljs')
<script>
    var GeoIp = new GeoIpClass();
    GeoIp.setIp('<?= $ip; ?>');
    GeoIp.getData();
</script>
@stop