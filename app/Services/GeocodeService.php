<?php

namespace App\Services;

use App\Models\Settlement;
use Geocoder\Provider\Nominatim\Nominatim;
use Geocoder\StatefulGeocoder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class GeocodeService
{
    private StatefulGeocoder $geocoder;

    public function __construct(Client $client)
    {
        $this->geocoder = new StatefulGeocoder(
            Nominatim::withOpenStreetMapServer($client, 'Mozilla/5.0'),
            'en'
        );
    }

    public function setCoordinatesForSettlement(Settlement $settlement): void
    {
        $coordinates = Cache::remember('settlement-' . $settlement->id, 60, function () use ($settlement) {
            return $this->geocoder->geocode($settlement->city_hall_address)
                ->first()
                ->getCoordinates();
        });

        $settlement->update(['lat' => $coordinates->getLatitude(), 'lon' => $coordinates->getLongitude()]);
    }
}
