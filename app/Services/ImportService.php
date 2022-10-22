<?php

namespace App\Services;

use Sunra\PhpSimple\HtmlDomParser;

class ImportService
{
    public function getDistricts(): array
    {
        $dom = HtmlDomParser::file_get_html('https://www.e-obce.sk/kraj/NR.html');
        $dom->find('div#telo');
        dd($dom);

        return [];
    }

    public function getSettlements(): array
    {
        return [];
    }

    public function getSettlementDetail(): array
    {
        return [];
    }
}
