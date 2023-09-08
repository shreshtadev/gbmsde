<?php

namespace App\Imports;

use App\Models\FamilyDetail;
use Maatwebsite\Excel\Concerns\ToModel;

class FamilyDetailImport implements ToModel
{
    /**
    * @param array $row
    * @return FamilyDetail|null
    */
    public function model(array $row)
    {

        return new FamilyDetail([
            'name_of_head_of_family' => $row[0],
            'address_line_1' => $row[1],
            'veda' => $row[2],
            'category' => $row[3],
            'sub_category' => $row[4],
            'area' => $row[5],
            'taluk' => $row[6],
            'email_address' => $row[7],
            'phone_number' => $row[8]
        ]);
    }
}
