<?php

namespace App\Imports;

use App\Models\DailyWorkLog;
use App\Models\FamilyMemberDetail;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FamilyMemberDetailImport implements ToModel, WithHeadingRow
{

    use Importable;

    public function __construct(public ?DailyWorkLog $dailyWorkLog)
    {
        if ($dailyWorkLog != null) {
            Log::debug('Updating Status');
            if ($dailyWorkLog->data_import_status == 'NOT_STARTED') {
                $dailyWorkLog->data_import_status = 'IN_PROGRESS';
                $dailyWorkLog->save();
            }
            Log::debug('Status Updated');
        }
    }
    /**
     * @param array $row
     */
    public function model(array $row)
    {
        return FamilyMemberDetail::create([
            'member_name' => $row['member_name'] ?? 'NA',
            'related_as' => $row['related_as'] ?? 'NA',
            'is_married' => strtolower($row['is_married']) == 'married' ? 1 : 0,
            'age' => intval($row['age']) ?? 0,
            'education_occupation_details' => $row['educationoccupation'] ?? 'NA',
            'family_detail_id' => $row['family_sl_no'],
            'email_address' => $row['email_address'] ?? 'NA',
            'phone_number' => $row['phone_number'] ?? 'NA',
        ]);
    }
}
