<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::role('Customer')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Username',
            'Auth Key',
            'Password',
            'Password Reset Token',
            'Email',
            'Company Name',
            'Company Email',
            'Status',
            'Role ID',
            'User_is_detected',
            'Address Line1',
            'Address Line2',
            'City',
            'State',
            'Country',
            'Zip Code',
            'Phone',
            'Fax',
            'Level',
            'Industry',
            'Source',
            'Customer Type',
            'Sales Type',
            'Sales Person',
            'Inside Person',
            'Lead',
            'Payment Type',
            'Payment Term',
            'Price Code',
            'Location Number',
            'Added_by_user',
            'User Image',
            'Deleted_at',
            'Created_at',
            'Updated_at',
        ];
    }
}
