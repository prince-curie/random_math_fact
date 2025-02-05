<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class RandomMathFact
{
    private ?int $number;

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function sumOfDigits(): int
    {
        $this->checkThatNumberPropertyIsNotNull();

        $number = $this->number;
        $sum = 0;

        do {
            $lastDigit = $number % 10;

            $sum += $lastDigit;

            $number = floor($number /10);
        } while ($number > 0);

        return $sum;
    }

    public function isPerfect(): bool
    {
        $this->checkThatNumberPropertyIsNotNull();

        if ($this->number <= 1) {
            return false;
        }

        if ($this->isOdd()) {
            return false;
        }

        $sum = 1;

        for ($i = 2; ($i * $i) <= $this->number; $i++) {
            if ($this->number % $i !== 0) {
                continue;
            }

            $sum += $i;

            if (($this->number / $i) !== $i) {
                $sum += ($this->number / $i);

            }
        }

        return $sum === $this->number;
    }

    public function isPrime(): bool
    {
        $this->checkThatNumberPropertyIsNotNull();

        if ($this->number <= 3) {
            return $this->number > 1;
        }

        if ($this->isEven() || $this->number % 3 === 0) {
            return false;
        }

        for ($i = 5; ($i * $i) < $this->number; $i += 6) {
            if ($this->number % $i === 0 || $this->number % ($i + 2) === 0) {
                return false;
            }
        }

        return true;
    }

    public function fetchFunFact(): string
    {
        $this->checkThatNumberPropertyIsNotNull();

        return (string) Http::numbersApi()->get("{$this->number}/math");
    }

    public function getProperties(): array
    {
        $this->checkThatNumberPropertyIsNotNull();

        $properties = [];

        if ($this->isArmstrong()) {
            array_push($properties, 'armstrong');
        }

        $numberParity = $this->numberParity();

        array_push($properties, $numberParity);

        return $properties;
    }

    private function numberOfDigits(): int
    {
        if ($this->number === 0) {
            return 1;
        }

        return floor(log10($this->number)) + 1;
    }

    private function numberParity(): string
    {
        return $this->isOdd() 
            ? 'odd'
            : 'even';
    }

    private function isOdd(): bool
    {
        return $this->number % 2 === 1;
    }

    private function isEven(): bool
    {
        return !$this->isOdd();
    }

    private function isArmstrong(): bool
    {
        $noOfDigits = $this->numberOfDigits();

        $number = $this->number;

        $sumOfPowers = 0;

        while ($number > 0) {
            $digit = $number % 10;

            $sumOfPowers += $digit ** $noOfDigits;

            $number = floor($number / 10);
        }

        return $this->number === $sumOfPowers;
    }

    private function checkThatNumberPropertyIsNotNull(): void
    {
        if (is_null($this->number)) {
            throw new Exception('Call the setNumber method to set a number first');
        }
    }
}
