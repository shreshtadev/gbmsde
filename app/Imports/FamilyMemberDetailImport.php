<?php

namespace App\Imports;

use App\Enums\RelatedAs;
use App\Models\FamilyMemberDetail;
use Maatwebsite\Excel\Concerns\ToModel;

class FamilyMemberDetailImport implements ToModel
{
    /**
     * @param array $row
     */
    public function model(array $row)
    {
        FamilyMemberDetail::create([
            'member_name' => $row[0],
            'related_as' => RelatedAs::findValueFromName($row[1]),
            'is_married' => $row[2] == 0,
            'age' => $row[4],
            'education_occupation_details' => $row[5],
            'family_detail_id' => $row[6] ?? new \Exception('FamilyDetail selection is mandatory'),
            'email_address' => $row[7] ?? '',
            'phone_number' => $row[8],
        ]);
    }
}
