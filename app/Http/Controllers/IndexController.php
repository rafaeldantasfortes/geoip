<?php

namespace App\Http\Controllers;

class IndexController extends Controller {

    private $timestamp;
    private $ip;

    function __construct() {
        $this->timestamp = now();
        $this->ip = $this->getIp();
    }

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $this->ip = $ip;
    }

    function getData() {
        $ip = $this->ip;
        $timestamp = $this->timestamp;
        return \Cache::remember('ipuser'.$ip, \Carbon\Carbon::now()->addMinutes(30), function () use ($ip, $timestamp) {
                    $data = json_decode(file_get_contents("http://api.ipstack.com/{$ip}?access_key=7c9ae79e2c89cadb4da05a018d5e0f8a"));
                    $data->timestamp = $timestamp;
                    $data->id = uniqid();
                    return response()->json($data);
                });
    }

    function index() {
        return view('frontend.pages.home', ['ip' => $this->ip]);
    }

}
