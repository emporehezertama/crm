<?php

namespace App\Imports;

use App\Models\CrmClient;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CrmClient([
            'name'                   => $row[4],
            'handphone'              => $row[5],
            'email'                  => $row[1],
            'pic_name'               => $row[0],
            'pic_email'              => $row[1],
            'pic_telepon'            => $row[5],
        ]);
    }
}
