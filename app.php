<?php

/**
 * Run `with docker run --rm -v $PWD:/app -w /app phpswoole/swoole php app.php`
 */

use Swoole\Coroutine;
use function Swoole\Coroutine\batch;

Coroutine::set(['hook_flags' => SWOOLE_HOOK_CURL]);

function get(string $url)
{
    $cURLConnection = curl_init();
    curl_setopt($cURLConnection, CURLOPT_URL, $url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    curl_exec($cURLConnection);

    return curl_getinfo($cURLConnection, CURLINFO_HTTP_CODE);
}

Coroutine\run(function () {
    $start_time = microtime(true);
    $results = batch([
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        },
        function () {
            return get('https://http-mock.deno.dev/200');
        }
    ]);
    var_dump($results);
    $end_time =  microtime(true) - $start_time;
    echo "Use {$end_time}s, Done\n";
});


$start_time = microtime(true);
$results = [
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
    get('https://http-mock.deno.dev/200'),
];
var_dump($results);
$end_time =  microtime(true) - $start_time;
echo "Use {$end_time}s, Done\n";
