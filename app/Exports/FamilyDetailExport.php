<?php
namespace App\Exports;
use App\Models\FamilyDetail;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;

class FamilyDetailExport implements FromCollection {

    public function __construct(public array $filters)
    {

    }

    public function collection() {
        $veda = $this->filters['veda'];
        $category = $this->filters['category'];
        $area = $this->filters['area'];
        $subCategory = $this->filters['subCategory'];
        $taluk = $this->filters['taluk'];
        $foundFamilyDetailsQuery = FamilyDetail::query();
        if ($veda != null) {
            $foundFamilyDetailsQuery->where('veda', $veda);
        }
        if ($category != null) {
            $foundFamilyDetailsQuery->where('category', $category);
        }
        if ($area != null) {
            $foundFamilyDetailsQuery->where('area', $area);
        }
        if ($taluk != null) {
            $foundFamilyDetailsQuery->where('taluk', $taluk);
        }
        if ($subCategory != null) {
            $foundFamilyDetailsQuery->where('sub_category', $subCategory);
        }

        $familyDetailsCount = $foundFamilyDetailsQuery->count();
        if($familyDetailsCount == 0) {
            new \Exception("No records found.");
        }
        return $foundFamilyDetailsQuery->get(['name_of_head_of_family', 'address_line_1', 'phone_number', 'email_address']);
    }
}
