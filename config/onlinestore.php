<?php

return [
    'currency_api_url' => env('CURRENCY_API_URL', 'https://api.exchangerate-api.com/v4/latest/'),
    'currency_base' => env('CURRENCY_BASE', 'USD'),
    
    'delivery' => [
        'google_maps_api_key' => env('GOOGLE_MAPS_API_KEY', 'YOUR_GOOGLE_MAPS_API_KEY'),
        'open_route_service_api_key' => env('OPEN_ROUTE_SERVICE_API_KEY', 'YOUR_OPENROUTESERVICE_API_KEY'),
    ],
];
