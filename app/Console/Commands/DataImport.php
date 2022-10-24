<?php

namespace App\Console\Commands;

use App\Models\Settlement;
use App\Services\ImportService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class DataImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command imports data from external source and saves it into DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImportService $importService)
    {
        try {
            DB::beginTransaction();
            foreach ($importService->getDistricts() as $district) {
                foreach ($importService->getSettlementsForDistrict($district) as $settlementUrl) {
                    $settlementDetail = $importService->getSettlementDetail($settlementUrl);
                    Settlement::updateOrCreate(['name' => $settlementDetail['name']], $settlementDetail);
                }
            }
            DB::commit();
            return Command::SUCCESS;
        } catch (Throwable $t) {
            Log::error($t->getMessage());
            DB::rollBack();

            return Command::FAILURE;
        }
    }
}
