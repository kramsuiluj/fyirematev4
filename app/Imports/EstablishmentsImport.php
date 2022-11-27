<?php

namespace App\Imports;

use App\Models\Establishment;
use Maatwebsite\Excel\Concerns\ToModel;

class EstablishmentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Establishment([
            'date' => $row[0],
            'owner' => $row[1],
            'name' => $row[2],
            'address' => $row[3],
            'amount_paid' => $row[4],
            'date_paid' => $row[5],
            'or_number' => $row[6],
            'ops_number' => $row[7],
            'date_released' => $row[8],
            'fsic_number' => $row[9],
            'issuance' => $row[10],
            'occupancy' => $row[11],
            'area' => $row[12],
            'remarks' => $row[13],
            'inspection_date' => $row[14],
            'io_number' => $row[15],
            'realty_tax' => $row[16],
            'amount' => $row[17],
        ]);
    }
}
