<?php

namespace App\Services;

use Goutte\Client;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ImportService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getDistricts(): array
    {
        return $this->client->request('GET', 'https://www.e-obce.sk/kraj/NR.html')
            ->filter('a.okreslink')->each(function (Crawler $node) {
                return $this->extractSettlementNameFromUrl($node->link()->getUri());
            });
    }

    public function getSettlementsForDistrict(string $district): array
    {
        return $this->client->request('GET', 'https://www.e-obce.sk/okres/' . $district . '.html')
            ->filter('td[width="33%"]')->each(function (Crawler $node) {
                return $node->children('a')->first()->link()->getUri();
            });
    }

    public function getSettlementDetail(string $url): array
    {
        $crawler = $this->client->request('GET', $url);

        return [
            'name' => $crawler->filter('td[class="obecmenuhead"]')->text(),
            'mayor_name' => $this->getTdValueByPreviousElement($crawler, 'Starosta:', 'Primátor:'),
            'city_hall_address' => $this->getCityHallAddress($crawler),
            'phone' => $this->getTdValueByPreviousElement($crawler, 'Tel:'),
            'fax' => $this->getTdValueByPreviousElement($crawler, 'Fax:'),
            'email' => $this->getTdValueByPreviousElement($crawler, 'Email:'),
            'web_address' => $this->getTdValueByPreviousElement($crawler, 'Web:'),
        ];
    }

    private function extractSettlementNameFromUrl(string $url): string
    {
        return Str::beforeLast(
            Str::afterLast($url, '/'),
            '.'
        );
    }

    private function getTdValueByPreviousElement(Crawler $crawler, string $key, ?string $secondaryKey = null): ?string
    {
        $result = $crawler->filter('td')
            ->reduce(function (Crawler $node) use ($key, $secondaryKey) {
                if ($secondaryKey) {
                    return $node->text() === $key || $node->text() === $secondaryKey;
                } else {
                    return $node->text() === $key;
                }
            });

        return $result->count() > 0 ? $result->first()->nextAll()->text() : null;
    }

    private function getCityHallAddress(Crawler $crawler): string
    {
        $email = $crawler->filter('td')
            ->reduce(function (Crawler $node) {
                return $node->text() === 'Email:';
            })
            ->first();


        $street = $email
            ->previousAll()
            ->text();

        $postcodeAndTown = $email
            ->closest('tr')
            ->nextAll()
            ->children()
            ->first()
            ->text();

        return $street . ', ' . $postcodeAndTown;
    }
}
