<?php

namespace Ontherocksoftware\RagLaravel;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Ontherocksoftware\RagLaravel\Exceptions\RagException;

class RagLaravel
{
    const BASE_URL = "https://test.red-amber.green/api/";

    private static function get($url)
    {
        $token = config('rag-laravel.token');

        return Http::withHeaders(['Accept' => 'application/json'])->withToken($token)->get(static::BASE_URL . $url);
    }

    private static function post($url, $data)
    {
        $token = config('rag-laravel.token');

        return Http::withHeaders(['Accept' => 'application/json'])->withToken($token)->post(static::BASE_URL . $url, $data);
    }

    public static function monitors($page = 1)
    {
        $response = static::get('monitors?page=$page');
        if ($response->ok()) {
            return $response->json();
        }

        throw new RagException(Arr::get($response->json(), 'message', 'Unknown error please check your config'));
    }

    public static function red($name, $message = null, $moreinfourl = null)
    {
        $data = [];
        if ($message) {
            $data['message'] = $message;
        }
        if ($moreinfourl) {
            $data['more_info_url'] = $moreinfourl;
        }
        $response = static::post("monitor/$name/red", $data);
        if ($response->ok()) {
            return $response->json();
        }

        throw new RagException(Arr::get($response->json(), 'message', 'Unknown error please check your config'));
    }

    public static function green($name, $message = null, $moreinfourl = null)
    {
        $data = [];
        if ($message) {
            $data['message'] = $message;
        }
        if ($moreinfourl) {
            $data['more_info_url'] = $moreinfourl;
        }
        $response = static::post("monitor/$name/green", $data);
        if ($response->ok()) {
            return $response->json();
        }

        throw new RagException(Arr::get($response->json(), 'message', 'Unknown error please check your config'));
    }

    public static function amber($name, $message = null, $moreinfourl = null)
    {
        $data = [];
        if ($message) {
            $data['message'] = $message;
        }
        if ($moreinfourl) {
            $data['more_info_url'] = $moreinfourl;
        }
        $response = static::post("monitor/$name/amber", $data);
        if ($response->ok()) {
            return $response->json();
        }

        throw new RagException(Arr::get($response->json(), 'message', 'Unknown error please check your config'));
    }
}
