<?php


namespace Cheezykins\AdventOfCode2020\Day4;


use Cheezykins\AdventOfCode2020\Day4\Validators\BirthYearValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\CountryIdValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\ExpirationYearValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\EyeColorValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\HairColorValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\HeightValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\IssueYearValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\PassportIdValidator;
use Cheezykins\AdventOfCode2020\Day4\Validators\Validator;

class Passport
{
    public ?int $birthYear;
    public ?int $issueYear;
    public ?int $expirationYear;
    public ?string $height;
    public ?string $hairColor;
    public ?string $eyeColor;
    public ?string $passportId;
    public ?int $countryId;

    public function __construct(array $fields)
    {
        $this->birthYear = $fields['byr'] ?? null;
        $this->issueYear = $fields['iyr'] ?? null;
        $this->expirationYear = $fields['eyr'] ?? null;
        $this->height = $fields['hgt'] ?? null;
        $this->hairColor = $fields['hcl'] ?? null;
        $this->eyeColor = $fields['ecl'] ?? null;
        $this->passportId = $fields['pid'] ?? null;
        $this->countryId = $fields['cid'] ?? null;
    }

    public function isValid(): bool
    {
        $fields = [
            'birthYear' => new BirthYearValidator(),
            'issueYear' => new IssueYearValidator(),
            'expirationYear' => new ExpirationYearValidator(),
            'height' => new HeightValidator(),
            'hairColor' => new HairColorValidator(),
            'eyeColor' => new EyeColorValidator(),
            'passportId' => new PassportIdValidator(),
            'countryId' => new CountryIdValidator(),
        ];

        $missingFields = [];

        /**
         * @var string $fieldName
         * @var Validator $validator
         */
        foreach ($fields as $fieldName => $validator) {
            $entry = $this->$fieldName;
            if ($entry === null || !$validator->validate($entry)) {
                $missingFields[] = $fieldName;
            }
        }

        if ($missingFields === ['countryId']) {
            return true;
        } elseif (count($missingFields) > 0) {
            return false;
        }
        return true;
    }
}
