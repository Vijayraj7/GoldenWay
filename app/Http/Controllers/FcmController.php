<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Matchh;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Withdraw;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\File;
use Razorpay\Api;
use Google\Client as GoogleClient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class FcmController
{

    function sendFCMMessageToTopic($topic, $title, $body)
    {
        if (isTest() == false) {
            // Get the access token
            $accessToken = $this->getToken();

            // FCM endpoint
            $url = 'https://fcm.googleapis.com/v1/projects/global-market-stars/messages:send';

            // Notification data
            $notification = [
                'title' => $title,
                'body' => $body,
            ];

            // Message payload
            $payload = [
                'message' => [
                    'topic' => $topic,
                    'notification' => $notification,
                    // 'android' => ['notification' => ['icon' => 'notyicon']]
                ],
            ];

            // Headers
            $headers = [
                'Authorization: Bearer ' . $accessToken,
                'Content-Type: application/json',
            ];

            // Initialize curl
            $ch = curl_init();

            // Configure curl options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

            // Execute curl
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }

            // Close curl
            curl_close($ch);
        }
        // dd($result);
    }

    public function getToken(): string
    {
        // Path to the service account credentials JSON file
        $jjson = '{
  "type": "service_account",
  "project_id": "global-market-stars",
  "private_key_id": "67df30ef64b8abefa5387aecf4c5497963c036ac",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEugIBADANBgkqhkiG9w0BAQEFAASCBKQwggSgAgEAAoIBAQDZrYS3WK5TW5yv\nEaZ+E95PELI7yuBvjEWgFK1cI62JIBXNQuOxITg8NLYpk22ia3q9j7FBz367h5aI\nDAuaf+rNni9fyUqqFMfsOP2BhRk6zvg+R4E0tM2kbfWeDm6/eh6/Dvjd0gs4jmsQ\nQm55S2ACMSmmKPJ9fmUfM5RDajRg5tIhGPif70BjedLb0FaG88bTGPhZ6H+HSdsE\nTkzscd45RNHhxyV8To7Yc4CeSAF2pSn3ItP2KR6vPP2JqrKc4FjT8igkXsKy1Llz\nexR6E/mgAMCOSh3z2VQTUwHXLta1swcFFkcuUtgSndfIVl2mPfQqE/xyGG1NhIzt\nnq7wZ63fAgMBAAECggEAGfmPB63eXMtmyVaVg8qX0Yl61eW3SGL4VUotBvypkt5a\n8PvACH1KpOyJUYa/zgzTQFbViQvbN0IjtVJH+YS1c8R3f2Tusu2jOaNHT4hJYsTF\nx0YTEJiunVC9vsGWzOR5UhqARJVG34B8csaVQNtnYSZAA7gzz252CfYcBWYL9Vqo\nCyjmH/E0yPIVPKWkVMDeHLTUTC/0IwEP7x/Ut8lwBJFg0sJWuxu8oQa2tPR4XaQ/\nefRf2BVsCml+UPYnrm2Eaouub7uWLpUP/r17w4u4XEMc9ktpnacDj8C5YEe1/mTb\nZhcy5ePCiAzATYc2M2/LeNyJIJMfHGXMFntmNePMyQKBgQD5eUO3r6/aQRo7BNY7\nRLoP9EdYh0jo675J9406yIOT+/amuafGn0wQZxFERv/bpH7MRRCgK4SXoHbXM4p4\nmPMCcHq73pndjvIC/lQNa26JpsJEmqjal7kZgK37+Xe1TP4hMmplaRQuWproX1qR\n5dJ4SM7ZqQHBig1DTokallvwbQKBgQDfX1DJcwkiCkYTVisDeBcS8lHsm6ceIfMF\nz2InqO3C/9ZpFlH5WQn3VKy3i5ClSbuzNEOHp68ID8KquXNoUQikyYgV8n11dACd\nIIb6zWk3+ad1ZCwQLobpfAl+bfn3fl8NEvn6Php0ec4tJoDfjpjY0MKnYZUrgw6b\nPi7iCKTf+wKBgC2r86fHNCyCyqiPZCEJnf6ZvA4LBmAN+JJWDbb7SotnD2rKhlqo\ngyZlmBWl4eV2IfiHlFmeXfHcYKVZPDqD1clWikGmqQiUyN2fbgfe6SeuLdadcdhC\n+pIeqrt8mlvIsqWlMzFJoXYzBDUSb+RR7Mw0mBnlBPtHqNHvqM4DROWpAn9AkUzI\n7ne1X0LiVAYa+puw3lrQCi5Eh4u4Ijo9PJd9xnYz6j/H0/UNiWxjofQt0yJuqqza\niZ4Otn+O2gyCGupkt9yee3nIeb+zq7NYzAeeJoxBYrNZ+hkFZNVZtnCLGfxfyxx3\nOXxsLslqQ7b86DtGcRHTUGHOMhQGy/LBY75FAoGAHQjbO4Cc61A96KK/EeJJJYQk\nwhU4Gnayu46m0kP+Sg0FWxgjh9pOncJXDetyGA0HUicZ/hAAc4APF5hBIN4UgON/\nq+9PcaX86+wkvNL/Lpgv8acdxd6jp0w2x1s2bVrP9dj2PSYHP0Uua63hzF7yFzQF\nR2+rDjNZc3vwCKrQDtg=\n-----END PRIVATE KEY-----\n",
  "client_email": "firebase-adminsdk-stkla@global-market-stars.iam.gserviceaccount.com",
  "client_id": "117920692691540922207",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-stkla%40global-market-stars.iam.gserviceaccount.com",
  "universe_domain": "googleapis.com"
}';


        // Scopes required for Firebase Cloud Messaging
        $scopes = [
            'https://www.googleapis.com/auth/firebase.messaging',
        ];

        $credentials = json_decode($jjson, true);

        // Prepare the JWT header and claim set
        $jwt_header = [
            'alg' => 'RS256',
            'typ' => 'JWT',
        ];

        $jwt_claim = [
            'iss' => $credentials['client_email'],
            'scope' => implode(' ', $scopes),
            'aud' => $credentials['token_uri'],
            'exp' => time() + 3600, // Token expires in 1 hour
            'iat' => time(),
        ];

        // Encode the JWT header and claim set
        $base64UrlHeader = base64_encode(json_encode($jwt_header));
        $base64UrlClaim = base64_encode(json_encode($jwt_claim));
        $signature = '';
        openssl_sign("$base64UrlHeader.$base64UrlClaim", $signature, $credentials['private_key'], 'sha256WithRSAEncryption');
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        $jwt = "$base64UrlHeader.$base64UrlClaim.$base64UrlSignature";

        // Send a POST request to fetch the access token
        $post_data = http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $credentials['token_uri']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        $response = curl_exec($ch);
        curl_close($ch);

        // Check for errors
        if ($response === false) {
            return ''; // Handle curl error
        }

        // Decode the JSON response
        $token_info = json_decode($response, true);

        if (isset($token_info['access_token'])) {
            return $token_info['access_token'];
        } else {
            return ''; // Handle error response
        }
    }

}