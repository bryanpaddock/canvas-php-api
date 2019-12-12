<?php

namespace Valenture\CanvasApi\Modules\SisImport\Factories;

use DateTime;
use Valenture\CanvasApi\Modules\SisImport\Objects\SisImport;

final class SisImportFactory
{
    public static function make($response): SisImport
    {
        $return = new SisImport();

        $return->setId($response->id);
        $return->setCreatedAt(DateTime::createFromFormat('Y-m-d\TH:m:iZ', $response->created_at));
        $return->setEndedAt(DateTime::createFromFormat('Y-m-d\TH:m:iZ', $response->ended_at));

        return $return;
    }
}