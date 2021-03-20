<?php

namespace Ontherocksoftware\RagLaravel;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Ontherocksoftware\RagLaravel\Exceptions\RagException;
use Spatie\LaravelRay\Ray;

class RagLaravel
{
    const BASE_URL = "https://api-test.red-amber.green/api/";
    
    private function buildRequest()
    {
        //$token =
    }

    private static function get($url)
    {
        $token = config('rag-laravel.token');

        return Http::withHeaders(['Accept' => 'application/json'])->withToken($token)->get(static::BASE_URL . $url);
    }

    private static function post($url, $data)
    {
        $token = config('rag-laravel.token');
        ray("URL[$url] Data next:");
        ray($data);
        ray("Full url [". static::BASE_URL . $url ."] Posting now...");

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
        ray("Gonna set red [$name]");
        if ($message) {
            $data['message'] = $message;
        }
        if ($moreinfourl) {
            $data['more_info_url'] = $moreinfourl;
        }
        $response = static::post("monitor/$name/red", $data);
        ray($response)->red();
        if ($response->ok()) {
            return $response->json();
        }

        throw new RagException(Arr::get($response->json(), 'message', 'Unknown error please check your config'));
    }

    public static function green($name, $message = null, $moreinfourl = null)
    {
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
        ray($response);

        throw new RagException(Arr::get($response->json(), 'message', 'Unknown error please check your config'));
    }

    public static function amber($name, $message = null, $moreinfourl = null)
    {
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
