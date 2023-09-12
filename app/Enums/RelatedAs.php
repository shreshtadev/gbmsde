<?php

namespace App\Enums;

use Exception;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Arr;

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
            'Son_In_Law' => 'ಅಳಿಯ'
        };
    }

    public static function findValueFromName(string $relatedAs) {
        $relatedAs = str_replace(" ", "_", $relatedAs);
        return get_object_vars(Arr::first(Arr::where(self::cases(), function ($rl) use ($relatedAs) {
            $name = $rl->name;
            return $name == $relatedAs;
        })))['value'];
    }
}
