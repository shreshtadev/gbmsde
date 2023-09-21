<?php

namespace App\Imports;

use App\Models\DailyWorkLog;
use App\Models\FamilyDetail;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FamilyDetailImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function __construct(public ?DailyWorkLog $dailyWorkLog) {
        Log::debug('Updating Status');
        if($dailyWorkLog->data_import_status == 'NOT_STARTED') {
            $dailyWorkLog->data_import_status = 'IN_PROGRESS';
            $dailyWorkLog->save();
        }
        Log::debug('Status Updated');
    }
    /**
    * @param array $row
    * @return FamilyDetail|null
    */
    public function model(array $row)
    {
        return FamilyDetail::create([
            'id' => $row['sl_no'],
            'name_of_head_of_family' => $row['name_of_head_of_the_family'] ?? 'NA',
            'address_line_1' => $row['address'] ?? 'NA',
            'veda' => $row['veda'] ?? 'NA',
            'category' => $row['category'] ?? 'NA',
            'sub_category' => $row['sub_category'] ?? 'NA',
            'gotra' => $row['gothra'] ?? 'NA',
            'area' => $row['area'] ?? 'NA',
            'taluk' => $row['taluk'] ?? 'NA',
            'email_address' => $row['email_address'] ?? 'NA',
            'phone_number' => $row['phone_number'] ?? 'NA',
            'occupation' => $row['profession'] ?? 'NA'
        ]);
    }

    public function chunkSize(): int {
        return 100;
    }

}
