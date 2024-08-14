<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function getPackage(Request $request)
    {
        $createdAtFrom = $request->query('created_at_from');
        $createdAtTo = $request->query('created_at_to');

        // Validate the date range
        try {
            $fromDate = Carbon::parse($createdAtFrom);
            $toDate = Carbon::parse($createdAtTo);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid date format'], 400);
        }

        if ($fromDate->diffInDays($toDate) > 32) {
            return response()->json(['message' => 'The date range cannot exceed 32 days'], 400);
        }

        // Construct the URL with query parameters
        $url = 'https://m6-agency-api.vns.gobizdev.com/packages?' . http_build_query([
                'created_at_from' => $createdAtFrom,
                'created_at_to' => $createdAtTo
            ]);

        $authToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IjcwRHdFdWxrOU5oQTJkSGNZQUJSVGJFV1AyYURneXpKaV9tekdYV1U1WXcifQ.eyJpc3MiOiJodHRwczovL29pZGMtdm5zLmdvYml6ZGV2LmNvbSIsImF1ZCI6InRlc3QiLCJqdGkiOiI3YzJlYTM1ZC0zMzUyLTQ2NTUtODU5Ni00ZDMxYmE0NGQxNzUiLCJpYXQiOjE3MDE4MzM0NDEsImV4cCI6MTg1OTUxMzQ0MSwiYWdlbmN5X2lkIjozLCJhZ2VuY3lfY29kZSI6Im5oYXBoYW5nIiwicGFydG5lcl9pZCI6MSwicGFydG5lcl9jb2RlIjoieGxvZ2lzdGljcyIsInNjb3BlIjoiY3JlYXRvcjo1MCIsInN1YiI6IjUwIn0.qp_GoegjY8HNIlZgt8jHRoNhlV0onxc9GY7pHOBMO-Ckgoqzmy17znMlJo_BItQygZCqY9QeHzDGdUYfVEcMG0R4ujHmB67gJ7IHp06ujy0hw_Hve2viBkeqXoFlinxFKXfoT5_JhKJHWuplHrQrOhD570VyNgwwQD8cTJJSf2lF0vT8ZB0SuX4m-yCQ5RBZvDhF7FWTg7rrhChsisQ0FhdjKfxuOudj1u2GKe6w3sL6-uMKShpFZesH3gaG5XovMUUaX9JR3ZAKZyGJCJ6b019551vFdhJhk_ptF47nyxU3xvY5LLNvujFchXfXgCjQKXDCKd8LjEfL-vnO1GYpXA';

        $options = [
            'http' => [
                'header' => "Authorization: Bearer $authToken\r\n"
            ]
        ];
        $context = stream_context_create($options);

        // Call the external API
        try {
            $response = file_get_contents($url, false, $context);
            $data = json_decode($response, true);

            // Check if the API response contains packages
            if (!isset($data['packages'])) {
                return response()->json(['message' => 'No packages found'], 404);
            }

            // Return the data as a JSON response
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch packages: ' . $e->getMessage()], 500);
        }
    }
}
