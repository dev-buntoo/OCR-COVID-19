<?php

namespace App\Services;

use App\Models\Citizen;
use Exception;
use Illuminate\Support\Facades\Auth;

final class GeneratePasscode
{
    protected $citizenId;
    protected $citizen;
    protected $counter = 0;
    public function __construct($citizenId)
    {
        $this->citizenId = $citizenId;
    }
    public function generatePasscodeForVaccination()
    {
        $randomNumber = rand(000001, 999999);
        if (!$this->validatePasscode($randomNumber)) {
            $this->counter++;
            if ($this->counter > 5) {
                $this->generatePasscodeForVaccination();
            } else {
                throw new Exception('Somthing went wrong while processing your request', 400);
            }
        }
        // random passcode will be returned
        return $randomNumber;
    }
    private function validatePasscode($passcode)
    {
        try {
            $checkPasscode = Citizen::where('passcode', $passcode)->first();
            if ($checkPasscode) {
                throw new Exception('Somthing went wrong while processing your request', 400);
            }
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}
