<?

namespace Vendor\OnlineStore\Services;

use Illuminate\Support\Facades\Http;

class CurrencyService
{
    protected string $apiUrl = 'https://api.exchangerate-api.com/v4/latest/';  // Пример API URL
    protected string $baseCurrency = 'USD';

    public function getRate(string $currency): float
    {
        $response = Http::get("{$this->apiUrl}{$this->baseCurrency}");

        if ($response->failed()) {
            throw new \Exception("Unable to fetch exchange rates.");
        }

        $rates = $response->json()['rates'];

        return $rates[$currency] ?? throw new \Exception("Rate for {$currency} not found.");
    }
}
