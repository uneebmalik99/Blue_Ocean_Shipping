<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Shipment;
use Carbon\Carbon;
use DateTime;

class ShipmentUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Shipments:Update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update Shipment every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current_date = (new DateTime)->format('Y-m-d');
        $now = Carbon::now();

        
        $shipments = Shipment::all();
        foreach($shipments as $shipment){
            $days = (strtotime($shipment['est_arrival_date']) - strtotime($current_date)) / (60 * 60 * 24);

            if($shipment['sale_date'] == $current_date){
                DB::update('update shipments set status = ? where id = ?',[2,$shipment['id']]);
            }
            if($days < 10){
                DB::update('update shipments set status = ? where id = ?',[3,$shipment['id']]);
            }
        }
    }
}
