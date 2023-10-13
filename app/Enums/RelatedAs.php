<?php

namespace App\Enums;

use Exception;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

enum RelatedAs: int implements HasLabel
{

    case Father = 0;
    case Mother =  1;
    case Mother_In_Law = 2;
    case Father_In_Law = 3;
    case Son = 4;
    case Daughter = 5;
    case Daughter_In_Law = 6;
    case Son_In_Law = 7;
    case GrandFather = 8;
    case GrandMother = 9;
    case Wife = 10;
    case Spouse = 10;
    case GrandSon = 11;
    case GrandDaughter = 12;
    case Chikkappa = 13;
    case Chikkamma = 14;
    case Sister = 15;
    case Brother = 16;
    case Friend = 17;
    case Bhavana_Maga = 18;
    case Sister_In_Law = 19;
    case Brother_In_Law = 20;
    case Brother_S_Wife = 21;
    case Brother_S_Son = 22;
    case Mother_In_Law
    case NA = 100;


    public function getLabel(): ?string
    {
        return match($this->name) {
            'Father' => 'ತಂದೆ',
            'Mother' => 'ತಾಯಿ',
            'Son' => 'ಮಗ',
            'Daughter' => 'ಮಗಳು',
            'Father_In_Law' => 'ಮಾವ',
            'Mother_In_Law' => 'ಅತ್ತೆ',
            'GrandFather' => 'ಅಜ್ಜ',
            'GrandMother' => 'ಅಜ್ಜಿ',
            'Daughter_In_Law' => 'ಸೊಸೆ',
            'Son_In_Law' => 'ಅಳಿಯ',
            'Wife' => 'ಹೆಂಡತಿ',
            'Spouse' => 'ಹೆಂಡತಿ',
            'GrandSon' => 'ಮೊಮ್ಮಗ',
            'GrandDaughter' => 'ಮೊಮ್ಮಗಳು',
            'Chikkappa' => 'ಚಿಕ್ಕಪ್ಪ',
            'Chikkamma' => 'ಚಿಕ್ಕಮ್ಮ',
            'Sister' => 'ಸಹೋದರಿ',
            'Brother' => 'ಸಹೋದರ',
            'Friend' => 'ಸ್ನೇಹಿತ',
            'Bhavana_Maga' => 'ಭಾವನ ಮಗ',
            'Sister_In_Law' => 'ನಾದಿನಿ',
            'Brother_In_Law' => 'ಸೋದರ ಮಾವ',
            'Brother_S_Wife' => 'ಅಣ್ಣನ ಹೆಂಡತಿ',
            'Brother_S_Son' => 'ಅಣ್ಣನ ಮಗ',
            'NA' => 'ಲಭ್ಯವಿಲ್ಲ'
        };
    }

    public static function findValueFromName(string $relatedAs) {
        return get_object_vars(Arr::first(Arr::where(self::cases(), function ($rl) use ($relatedAs) {
            $name = $rl->name;
            $fmtName = str_replace("_",'',$name);
            $fmtRelatedAs = str_replace(" ", '', $relatedAs);
            return strtolower($fmtName) == strtolower($fmtRelatedAs);
        })))['value'];
    }
}
