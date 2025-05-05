<?php

namespace Vendor\OnlineStore\Services;

use Illuminate\Support\Facades\Http;

class DeliveryService
{
    // Пример использования двух геосервисов и расчета по формуле
    protected string $googleMapsApiUrl = 'https://maps.googleapis.com/maps/api/distancematrix/json';
    protected string $openRouteServiceApiUrl = 'https://api.openrouteservice.org/v2/matrix';
    protected string $googleMapsApiKey = 'YOUR_GOOGLE_MAPS_API_KEY';
    protected string $openRouteServiceApiKey = 'YOUR_OPENROUTESERVICE_API_KEY';

    public function calculate(string $from, string $to, string $provider = 'google'): float
    {
        switch ($provider) {
            case 'google':
                return $this->calculateGoogle($from, $to);
            case 'openrouteservice':
                return $this->calculateOpenRouteService($from, $to);
            case 'math':
                return $this->calculateUsingMath($from, $to);
            default:
                throw new \InvalidArgumentException("Unknown provider: {$provider}");
        }
    }

    protected function calculateGoogle(string $from, string $to): float
    {
        $response = Http::get($this->googleMapsApiUrl, [
            'origins' => $from,
            'destinations' => $to,
            'key' => $this->googleMapsApiKey,
        ]);

        if ($response->failed()) {
            throw new \Exception('Google Maps API request failed.');
        }

        $data = $response->json();
        $distanceInKm = $data['rows'][0]['elements'][0]['distance']['value'] / 1000;

        return $distanceInKm * 1.2; // Цена доставки за километр, условный коэффициент
    }

    protected function calculateOpenRouteService(string $from, string $to): float
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->openRouteServiceApiKey}"
        ])->post($this->openRouteServiceApiUrl, [
            'locations' => [
                [floatval(explode(',', $from)[1]), floatval(explode(',', $from)[0])],
                [floatval(explode(',', $to)[1]), floatval(explode(',', $to)[0])],
            ],
            'metrics' => ['distance'],
        ]);

        if ($response->failed()) {
            throw new \Exception('OpenRouteService API request failed.');
        }

        $data = $response->json();
        $distanceInKm = $data['distances'][0][1] / 1000;

        return $distanceInKm * 1.5; // Цена доставки за километр, условный коэффициент
    }

    protected function calculateUsingMath(string $from, string $to): float
    {
        $fromCoordinates = explode(',', $from);
        $toCoordinates = explode(',', $to);

        // Простейшая формула Хаверсина для вычисления расстояния между двумя точками по их координатам
        $lat1 = deg2rad(floatval($fromCoordinates[0]));
        $lon1 = deg2rad(floatval($fromCoordinates[1]));
        $lat2 = deg2rad(floatval($toCoordinates[0]));
        $lon2 = deg2rad(floatval($toCoordinates[1]));

        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) * sin($dlat / 2) +
             cos($lat1) * cos($lat2) *
             sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $earthRadius = 6371; // Радиус Земли в километрах
        $distanceInKm = $earthRadius * $c;

        return $distanceInKm * 1.3; // Цена доставки за километр, условный коэффициент
    }
}
