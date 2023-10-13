<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Imports\FamilyDetailImport;
use App\Imports\FamilyMemberDetailImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // FamilyDetail::factory(1000)->create();
        // FamilyMemberDetail::factory(1500)->create();
        // DailyWorkLog::factory(10)->create();

        $pathToImportFDGiri = 'D:\junkspace\sbms\giri\familydetails.csv';
        $pathToImportFMDGiri = 'D:\junkspace\sbms\giri\familymemberdetails.csv';

        $pathToImportFDHp = 'D:\junkspace\sbms\hp\familydetails.csv';
        $pathToImportFMDHp = 'D:\junkspace\sbms\hp\familymemberdetails.csv';

        $pathToImportFDRanga = 'D:\junkspace\sbms\ranga\familydetails.csv';
        $pathToImportFMDRanga = 'D:\junkspace\sbms\ranga\familymemberdetails.csv';

        // Excel::import(new FamilyDetailImport(null), $pathToImportFDGiri);
        // Excel::import(new FamilyDetailImport(null), $pathToImportFDHp);
        // Excel::import(new FamilyDetailImport(null), $pathToImportFDRanga);

        Excel::import(new FamilyMemberDetailImport(null), $pathToImportFMDGiri);
        Excel::import(new FamilyMemberDetailImport(null), $pathToImportFMDHp);
        Excel::import(new FamilyMemberDetailImport(null), $pathToImportFMDRanga);
    }
}
