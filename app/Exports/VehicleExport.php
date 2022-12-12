<?php

namespace App\Exports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VehicleExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(int $status) 
    {
        $this->status = $status;
    }
    public function collection()
    {
        return Vehicle::with('vehicle_status')->where('status', $this->status)->get();
    }

    public function headings(): array
    {
        return [
            'customer_name',
            'vin',
            'year',
            'make',
            'model',
            'vehicle_type',
            'color',
            'weight',
            'value',
            'auction',
            'buyer_id',
            'key',
            'note',
            'hat_number',
            'title_type',
            'title',
            'title_rec_date',
            'title_state',
            'title_number',
            'shipper_name',
            'status',
            'sale_date',
            'paid_date',
            'days',
            'posted_date',
            'pickup_date',
            'delivered',
            'delivered_date',
            'pickup_location',
            'site',
            'dealer_fee',
            'late_fee',
            'auction_storage',
            'towing_charges',
            'warehouse_storage',
            'title_fee',
            'port_detention_fee',
            'custom_inspection',
            'additional_fee',
            'insurance',
            'fee',
            'customer_paying_fee',
            'profit',
            'paid_by',
            'bidder',
            'lot',
            'entry_date',
            'age',
            'assign_date',
            'description',
            'dispatch_date',
            'port',
            'vehicle_is_deleted',
            'shipment_id',
            'added_by_user',
        ];
    }

    public function map($row): array
    {
        return [
            $row->customer_name,
            $row->vin,
            $row->year,
            $row->make,
            $row->model,
            $row->vehicle_type,
            $row->color,
            $row->weight,
            $row->value,
            $row->auction,
            $row->buyer_id,
            $row->key,
            $row->note,
            $row->hat_number,
            $row->title_type,
            $row->title,
            $row->title_rec_date,
            $row->title_state,
            $row->title_number,
            $row->shipper_name,
            $row->vehicle_status->status_name,
            $row->sale_date,
            $row->paid_date,
            $row->days,
            $row->posted_date,
            $row->pickup_date,
            $row->delivered,
            $row->delivered_date,
            $row->pickup_location,
            $row->site,
            $row->dealer_fee,
            $row->late_fee,
            $row->auction_storage,
            $row->towing_charges,
            $row->warehouse_storage,
            $row->title_fee,
            $row->port_detention_fee,
            $row->custom_inspection,
            $row->additional_fee,
            $row->insurance,
            $row->fee,
            $row->customer_paying_fee,
            $row->profit,
            $row->paid_by,
            $row->bidder,
            $row->lot,
            $row->entry_date,
            $row->age,
            $row->assign_date,
            $row->description,
            $row->dispatch_date,
            $row->port,
            $row->vehicle_is_deleted,
            $row->shipment_id,
            $row->added_by_user,
        ];
    }
}
