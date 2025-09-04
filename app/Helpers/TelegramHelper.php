<?php

namespace App\Helpers;

use Exception;
use Laravel\Reverb\Loggers\Log;
use Illuminate\Support\Facades\Http;
use PDO;

class TelegramHelper
{

    public static function sendContactNotification($contact){

        // dd($contact['name']);

        $message = "🛎️ *Customer Inquiry!*\n\n" .
            "👤 Name: {$contact['name']}\n" .
            "📞 Phone: {$contact['phone']}\n" .
            "📧 Email: {$contact['email']}\n" .
            "🗨️ Subject: {$contact['subject']}\n" .
            "🗨️ Message: {$contact['comment']}";


        $url = "https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage";

        // dd($url);
        try{
            Http::post($url,[
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $message,
                'parse_mode' => 'Markdown'
            ]);
        }catch(Exception $e){
            dd('Telegram Notification Failed: ' . $e->getMessage());
        }

    }

    public static function sendReservationNotification(array $data){

        // dd($data);

        $mealList = is_array($data['meals']
            ? implode(', ', $data['meals'])
            : $data['meals']
        );

        // dd($data['first_name']);

        $message = "🛎️ *New Room Booking!*\n\n" .
            "👤 Name: {$data['first_name']} {$data['last_name']}\n" .
            "📞 Phone: {$data['contact']}\n" .
            "📧 Email: {$data['email']}\n" .
            "🏨 Room: {$data['room_id']}\n" .
            "📅 Dates: {$data['checkin_datetime']} to {$data['checkout_datetime']}\n" .
            "👥 Adults: {$data['adults']}\n" .
            "👥 Children: {$data['children']}\n" . 
            "🍽️ Meal : {$mealList}";
        $url = "https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage";

        try{
            Http::post($url,[
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $message,
                'parse_mode' => 'Markdown'
            ]);
        }catch(Exception $e){
            dd('Telegram Notification Failed' . $e->getMessage());
        }

    }
}

