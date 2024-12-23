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
        $url = 'https://agency-api-logistics.mygobiz.net/packages?' . http_build_query([
                'created_at_from' => $createdAtFrom,
                'created_at_to' => $createdAtTo
            ]);

        $authToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6ImJZLVBuSlJLbmI3UldWWWIwc05VeTM5bEJrSEg2bUFfRUg3cWN1ZkdLUHcifQ.eyJpc3MiOiJodHRwczovL29pZGMtbG9naXN0aWNzLm15Z29iaXoubmV0IiwiYXVkIjoibTYiLCJqdGkiOiJlZTJiZTMzNi01NmYxLTQ5MzctODM5MC05YzY1NWY3OTVhZTMiLCJpYXQiOjE3Mjg2NDI4MjMsImV4cCI6MTg4NjMyMjgyMywiYWdlbmN5X2lkIjoxNTUsImFnZW5jeV9jb2RlIjoiaWxfa3lndWk4OCIsInBhcnRuZXJfaWQiOjU5LCJwYXJ0bmVyX2NvZGUiOiJreWd1aTg4Iiwic2NvcGUiOiJjcmVhdG9yOjMzNjQiLCJzdWIiOiIzMzY0In0.y1NbwgNjbelaR1rhZs3ALGkuSOz-ah3uoj_QNEQ15BLLYuCfy9WKk5gJ2nNlCgA7JpR6qlJ3FVL6TlHyafTQDke8YtN-KrNyBdWLutQUT7MXDCzR64I0jkA4NFrCgwQnN9q5rIE9kBqHeqO66FjmNW1sVa4S5tgzxt6l74mwiCp4o2NHPRuOQ-lQuJatcMu7EUWwZEGTzmAp45YkHdxyX1eZoqR-aXnQMtBpyA3CoeUxJKkIlVcpEHbgcXQ6th6Wb7IsPw7gUwiW7xSG4ua3mmDZuE7XPb5VWbfOx3jsdMxhE2IrK4WuhpOYPr0b32juu7EPkEYLPXPaQ-1WfHT80g';

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
