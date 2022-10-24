<?php

namespace App\Console\Commands;

use App\Models\Settlement;
use App\Services\GeocodeService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Throwable;

class DataGeocode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command adds GPS coordinates to settlement models';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(GeocodeService $geocodeService)
    {
        try {
            Settlement::all()
                ->each(function (Settlement $settlement) use ($geocodeService) {
                    $geocodeService->setCoordinatesForSettlement($settlement);
                });
            return Command::SUCCESS;
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            return Command::FAILURE;
        }
    }
}
