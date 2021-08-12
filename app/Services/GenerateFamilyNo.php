<?php

namespace App\Services;

use App\Models\FamilyNumber;

final class GenerateFamilyNumber
{
    public static function generateFamilyNumber()
    {
        $randomNumber = rand(100000,999999);
        $familyNumber = new FamilyNumber();
        $familyNumber->family_number = $randomNumber;
        $familyNumber->save();
        return $familyNumber;
    }
}
