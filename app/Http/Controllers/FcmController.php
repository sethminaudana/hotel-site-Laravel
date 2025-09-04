<?php

namespace App\Http\Controllers;

use App\Models\User;
use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Messaging\RegistrationToken;

class FcmController extends Controller
{
    public function updateDeviceToken(Request $request){
        $request->validate(['fcm_token' => 'required|string']);

        $request->user()->update(['fcm_token' => $request->fcm_token]);

        return response()->json(['message' => 'Token saved']);
    }

    public function sendFcmNotification(Request $request){

        
        $request->validate([
            'topic' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        // $user = User::find($request->user_id);

        // if(!$user->fcm_token){
        //     return response()->json(['error' => 'User has no FCM token']);
        // }

        $client = new GoogleClient();
        $client->setAuthConfig(Storage::path('firebase\firebase-credentials.json'));
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $client->refreshTokenWithAssertion();
        $token = $client->getAccessToken()['access_token'];

        $payload = [
            "message" => [
                "topic" => $request->topic,
                "data" => [
                    "click_action" => url('/room'),
                    "title" => $request->title,
                    "body" => $request->body,
                    "icon" => url('/img/logo/favicon.png'),
                    "badge" => url('/img/logo/favicon.png'),
                    "dataArray" => $request->dataArray,
                ],
            ]
        ];

        $response = Http::withToken($token)->post(
            "https://fcm.googleapis.com/v1/projects/" . env('FIREBASE_PROJECT_ID') . "/messages:send",
            $payload
        );

        // dd($response);

        return response()->json([
            'message' => 'Notification sent',
            'firebase_response' => $response->json(),
        ]);
    }






    public function subscribeToTopic(Request $request){
        $request->validate([
            'token' => 'required|string',
            'topic' => 'required|string',
        ]);

        $factory = (new Factory)->withServiceAccount(Storage::path('firebase\firebase-credentials.json'));
        $messaging = $factory->createMessaging();

        $messaging->subscribeToTopic($request->topic, RegistrationToken::fromValue($request->token));

        return response()->json(['message' => 'Subscribed to topic']);

    }


    public function unsubscribeFromTopic(Request $request){

        $request->validate([
            'token' => 'required|string',
            'topic' => 'required|string',
        ]);


        $factory = (new Factory)->withServiceAccount(Storage::path('firebase\firebase-credentials.json'));
        $messaging = $factory->createMessaging();

        $messaging->unsubscribeFromTopic($request->topic, RegistrationToken::fromValue($request->token));

        return response()->json(['message' => 'Unsubscribed from the topic']);

    }
}
