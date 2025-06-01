<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity;

use DateTime;

/**
 * this describes a human beeing
 */
class Human
{
    private string $name;
    private string $gender;
    private DateTime $birthday;
    private int $sizeCentimeters;
    private int $weightKilograms;
    private string $eyeColor;
    private string $hairColor;
    private string $skinColor;
    private ?array $skills;
    private ?array $softSkills;

    /**
     * human class constructor
     * @param string $name name
     * @param string $gender gender
     * @param string (optional) $birthday YYYY-MM-DD
     * @param int (optional) $sizeCentimeters 
     * @param int (optional) $weightKilograms 
     * @param array (optional) $skills 
     * @param array (optional) $softSkills 
     * @param string (optional) $eyeColor 
     * @param string (optional) $hairColor 
     * @param string (optional) $skinColor 
     */
    function __construct(
        ?string $name = NULL,
        ?string $gender = NULL,
        ?DateTime $birthday = NULL,
        ?int $sizeCentimeters = NULL,
        ?int $weightKilograms = NULL,
        ?array $skills = NULL,
        ?array $softSkills = NULL,
        ?string $eyeColor = NULL,
        ?string $hairColor = NULL,
        ?string $skinColor = NULL
    ) {
        $this->name = $name;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->sizeCentimeters = $sizeCentimeters;
        $this->weightKilograms = $weightKilograms;
        $this->skills = $skills;
        $this->softSkills = $softSkills;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->skinColor = $skinColor;
    }
    
    /**
     * get a random avatar picture
     * @return string picture url
     */
    public function getAvatarImage(): string
    {
        if (!random_int(0, 99)) {
            $_gender = 'lego';
            $_random_number = (string)random_int(0, 9);
        } else {
            $_gender = $this->getGender() === 'female' ? 'women' : 'men';
            $_random_number = (string)random_int(0, 99);
        }

        return '<img width="128" height="128" src="https://randomuser.me/api/portraits/' . $_gender . '/' . $_random_number . '.jpg" />';
    }

    /**
     * get svg full body image depending on human properties
     * @return string svg image code
     */
    public function getFullBodyImage(): string
    {
        $bodyMassIndex = $this->getBodyMassIndex();
        $humanSize = $this->getSizeCentimeters();

        $humanSizePixels = $humanSize * 2;
        $bodyMassIndexPixels = $bodyMassIndex / 30;

        $proportions = round($humanSizePixels / 11);
        $hairSizePixels = $proportions * 1;
        $headSizePixels = $proportions * 1;
        $bodySizePixels = $proportions * 4;
        $legsSizePixels = $proportions * 5;
        $armsSizePixels = $proportions * 4;
        $armsAndLegsThicknessPixels = round($bodyMassIndexPixels * 10);

        $svg = '
            <svg height="' . $humanSizePixels . '" width="100%">
                
                <!-- left leg -->
                <line 
                    x1="160" 
                    y1="' . ($hairSizePixels + $headSizePixels + $bodySizePixels - $proportions) . '" 
                    x2="' . (160 + $proportions) . '" 
                    y2="' . ($hairSizePixels + $headSizePixels + $bodySizePixels + $legsSizePixels) . '" 
                    stroke="' . $this->skinColor . '" 
                    stroke-width="' . $armsAndLegsThicknessPixels . '" 
                />
                
                <!-- right leg -->
                <line 
                    x1="140" 
                    y1="' . ($hairSizePixels + $headSizePixels + $bodySizePixels - $proportions) . '" 
                    x2="' . (140 - $proportions) . '" 
                    y2="' . ($hairSizePixels + $headSizePixels + $bodySizePixels + $legsSizePixels) . '" 
                    stroke="' . $this->skinColor . '" 
                    stroke-width="' . $armsAndLegsThicknessPixels . '" 
                /> 
                
                <!-- right arm -->
                <line 
                    x1="' . (150 + $armsSizePixels) . '" 
                    y1="' . str_replace(',', '.', (string)($hairSizePixels + $headSizePixels + $bodySizePixels / 2 - $armsSizePixels)) . '" 
                    x2="150" 
                    y2="' . str_replace(',', '.', (string)($hairSizePixels + $headSizePixels + $bodySizePixels / 2)) . '" 
                    stroke="' . $this->skinColor . '" 
                    stroke-width="' . $armsAndLegsThicknessPixels . '" 
                />
                
                <!-- left arm -->
                <line 
                    x1="' . (150 - $armsSizePixels) . '" 
                    y1="' . str_replace(',', '.', (string)($hairSizePixels + $headSizePixels + $bodySizePixels / 2 - $armsSizePixels)) . '" 
                    x2="150" 
                    y2="' . str_replace(',', '.', (string)($hairSizePixels + $headSizePixels + $bodySizePixels / 2)) . '" 
                    stroke="' . $this->skinColor . '" 
                    stroke-width="' . $armsAndLegsThicknessPixels . '"
                />
                
                <!-- body -->
                <ellipse 
                    cx="150" 
                    cy="' . str_replace(',', '.', (string)($bodySizePixels / 2 + $hairSizePixels + $headSizePixels)) . '" 
                    rx="' . str_replace(',', '.', (string)(round($bodySizePixels / 4) * $bodyMassIndexPixels)) . '" 
                    ry="' . str_replace(',', '.', (string)($bodySizePixels / 2)) . '" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="' . $this->skinColor . '" 
                />

                <!-- head -->
                <circle 
                    cx="150" 
                    cy="' . str_replace(',', '.', (string)($headSizePixels / 2 + $hairSizePixels)) . '" 
                    r="' . str_replace(',', '.', (string)($headSizePixels / 2)) . '" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="' . $this->skinColor . '" 
                />

                <!-- left eye -->
                <ellipse 
                    cx="135" 
                    cy="' . (5 + $hairSizePixels) . '" 
                    rx="8" 
                    ry="4" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="' . $this->eyeColor . '" 
                />

                <!-- right eye -->
                <ellipse 
                    cx="165" 
                    cy="' . (5 + $hairSizePixels) . '" 
                    rx="8" 
                    ry="4" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="' . $this->eyeColor . '" 
                />

                <!-- mouth -->
                <ellipse 
                    cx="150" 
                    cy="' . (25 + $hairSizePixels) . '" 
                    rx="15" 
                    ry="7" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="red" 
                />

                <!-- hair -->
                <path 
                    d="M208,' . $hairSizePixels . ' a30,30 0 1,0 -115,0" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="' . $this->hairColor . '" 
                />

            </svg>
        ';

        return $svg;
    }

    /**
     * get the zodiac of the human depending on birthday
     * @return string zodiac name
     */
    public function getZodiac(): string
    {
        $dxa = substr($this->birthday->format('Y-m-d'), 5);
        $uy = 0;
        foreach ([
            'Aquarius' => 20,
            'Pisces' => 19,
            'Aries' => 20,
            'Taurus' => 20,
            'Gemini' => 20,
            'Cancer' => 21,
            'Leo' => 22,
            'Virgo' => 23,
            'Libra' => 23,
            'Scorpio' => 23,
            'Sagittarius' => 22,
            'Capricorn' => 21
        ] as $k => $v) {
            if ($dxa > (++$uy < 10 ? '0' : '') . "$uy-$v") {
                $zodiac = $k;
            }
        }
        return $zodiac ?? 'Capricorn';
    }

    /**
     * add a skill
     * @param string skill name
     */
    public function addSkill(string $skill)
    {
        if (!in_array($skill, $this->skills ?? []))
            $this->skills[] = $skill;
    }

    /**
     * add a softskill
     * @param string skill name
     */
    public function addSoftSkill(string $softSkill)
    {
        if (!in_array($softSkill, $this->softSkills ?? []))
            $this->softSkills[] = $softSkill;
    }

    public function getBodyMassIndex(): float
    {
        $bmi = $this->weightKilograms / pow(($this->sizeCentimeters / 100), 2);
        return round($bmi, 2);
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function setSkills(array $skills)
    {
        $this->skills = $skills;
    }

    public function getSoftSkills(): array
    {
        return $this->softSkills;
    }

    public function setSoftSkills(array $softSkills)
    {
        $this->softSkills = $softSkills;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAgeYears(): int
    {
        $now = new DateTime();
        $age = date_diff($this->birthday, $now);
        return (int)$age->format('%y');
    }

    public function getSizeCentimeters(): int
    {
        return $this->sizeCentimeters;
    }

    public function setSizeCentimeters(int $size)
    {
        $this->sizeCentimeters = $size;
    }

    public function getWeightKilograms(): int
    {
        return $this->weightKilograms;
    }

    public function setWeightKilograms(int $weight)
    {
        $this->weightKilograms = $weight;
    }

    public function getBirthday(): string
    {
        return $this->birthday->format('l, j. F Y');
    }

    public function setBirthday(DateTime $date)
    {
        $this->birthday = $date;
    }

    public function getEyeColor(): string
    {
        return $this->eyeColor;
    }

    public function setEyeColor(string $eyeColor)
    {
        $this->eyeColor = $eyeColor;
    }

    public function getHairColor(): string
    {
        return $this->hairColor;
    }

    public function setHairColor(string $hairColor)
    {
        $this->hairColor = $hairColor;
    }

    public function getSkinColor(): string
    {
        return $this->skinColor;
    }

    public function setSkinColor(string $skinColor)
    {
        $this->skinColor = $skinColor;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender)
    {
        $this->skinColor = $gender;
    }
}
