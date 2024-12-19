<?php

function getChar($char)
{
    $url = 'https://www.wikipedia.com.ua/';

    $sh = curl_init();

    curl_setopt($sh, CURLOPT_URL, $url);
    curl_setopt($sh, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($sh, CURLOPT_SSL_VERIFYPEER, false);

    $httpContent = curl_exec($sh);

    if (curl_errno($sh)) {
        echo 'Bug cURL: ' . curl_error($sh) . PHP_EOL;
        curl_close($sh);
        return;
    }

    curl_close($sh);

    if (strlen($char) !== 1) {
        echo "Please, enter one char." . PHP_EOL;
        return;
    }

    $charCount = substr_count($httpContent, $char);
    echo "Char '$char' found on the page $charCount." . PHP_EOL;
}

if (isset($argv[1])) {
    $character = $argv[1];
    getChar($character);
} else {
    echo "Enter a character as a parameter" . PHP_EOL;
}
