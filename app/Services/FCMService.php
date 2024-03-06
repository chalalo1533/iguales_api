<?php
 namespace App\Services;

 use App\Models\User;

 class FCMService
 {

    // send notification to user using firebase cloud messaging
    public static function send_notification($device_token, $title, $body)
    {
      //  $user = User::where('id', $user)->first();
        $url = "https://fcm.googleapis.com/fcm/send";
        $server_key = env('FCM_SERVER_KEY');
        $headers = [
            'Authorization' => 'key=' . $server_key,
            'Content-Type' => 'application/json',
        ];
        

        // send via GuzzleHttp
        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'headers' => $headers,
            'json' => [
                'to' => $device_token, // user's device token for fcm
                'data' => [
                    'title' => $title,
                    'body' => $body,
                ],
            ],
        ]);

        return $response->getBody();

    }

}