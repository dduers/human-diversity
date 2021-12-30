<?php
declare(strict_types=1);

namespace Dduers\HumanDiversity;

use DateTime;
use Exception;

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
    private array $skills;
    private array $softSkills;

    private const MAX_BODY_SIZE = 250;
    private const MIN_BODY_SIZE = 50;
    private const MAX_WEIGHT = 180;
    private const MIN_WEIGHT = 3;

    private array $possibleGenders = [];
    private array $possibleFemaleNames = [];
    private array $possibleMaleNames = [];
    private array $possibleSkills = [];
    private array $possibleSkinColors = [];
    private array $possibleHairColors = [];
    private array $possibleEyeColors = [];
    private array $possibleSoftSkills = [];
    
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
        ?string $birthday = NULL, 
        ?int $sizeCentimeters = NULL, 
        ?int $weightKilograms = NULL, 
        ?array $skills = NULL,
        ?array $softSkills = NULL,
        ?string $eyeColor = NULL, 
        ?string $hairColor = NULL, 
        ?string $skinColor = NULL
    ) {
        

        if (!$gender) {
            $gender = $this->getRandomGender();
        }
        $this->gender = $gender;

        if (!$name) {
            switch ($this->gender) {
                case 'male':
                    $name = $this->getRandomMaleName();
                    break;
                
                case 'female':
                    $name = $this->getRandomFemaleName();
                    break;
            }
        }
        $this->name = $name;

        if (!$birthday) {
            $birthday = $this->createRandomBirthday();
        } 
        $this->birthday = new DateTime($birthday);

        if (!$sizeCentimeters) {
            $sizeCentimeters = $this->createRandomNumber(self::MIN_BODY_SIZE, self::MAX_BODY_SIZE);
        }
        $this->sizeCentimeters = $sizeCentimeters;

        if (!$weightKilograms) {
            $weightKilograms = $this->createRandomNumber(self::MIN_WEIGHT, self::MAX_WEIGHT);
        }
        $this->weightKilograms = $weightKilograms;

        if (!$skills) {
            $skills = $this->getRandomSkills();
        }
        $this->skills = $skills;

        if (!$softSkills) {
            $softSkills = $this->getRandomSoftSkills();
        }
        $this->softSkills = $softSkills;

        if (!$eyeColor) {
            $eyeColor = $this->getRandomEyeColor();
        }
        $this->eyeColor = $eyeColor;

        if (!$hairColor) {
            $hairColor = $this->getRandomHairColor();
        }
        $this->hairColor = $hairColor;

        if (!$skinColor) {
            $skinColor = $this->getRandomSkinColor();
        }
        $this->skinColor = $skinColor;
    }

    /**
     * create a random birth date YYYY-MM-DD
     * @return string random birth date
     */
    private function createRandomBirthday(): string
    {
        $day = rand(1, 28);
        $month = rand(1, 12);
        $maxYear = date('Y') - 1;
        $year = rand(1920, $maxYear);
        return $year.'-'.$month.'-'.$day;
    }

    /**
     * create random html hex color code
     * @return string html hex color code
     */
    private function createRandomColor(): string
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    /**
     * create random number
     * @param int $min minimum number
     * @param int $max maximum number
     * @return string html hex color code
     */
    private function createRandomNumber(int $min, int $max): int
    {
        return rand($min, $max);
    }

    /**
     * get random skills
     * @return array skills
     */
    private function getRandomSkills(): array
    {
        $skills = [];
        for ($i = 0; $i < rand(2, 5); $i++) {
            $possibleSkill = $this->possibleSkills[rand(0, count($this->possibleSkills) - 1)];
            if (!in_array($possibleSkill, $skills)) {
                $skills[] = $possibleSkill;
            }
        }
        return $skills;
    }

    /**
     * get random soft skills
     * @return array soft skills
     */
    private function getRandomSoftSkills(): array
    {
        $softSkills = [];
        for ($i = 0; $i < rand(2, 5); $i++) {
            $possibleSoftSkill = $this->possibleSoftSkills[rand(0, count($this->possibleSoftSkills) - 1)];
            if (!in_array($possibleSoftSkill, $softSkills)) {
                $softSkills[] = $possibleSoftSkill;
            }
        }
        return $softSkills;
    }

    /**
     * get a random eye color
     * @return string css color name
     */
    private function getRandomEyeColor(): string
    {
        return $this->possibleEyeColors[rand(0, count($this->possibleEyeColors) - 1)];
    }

    private function getRandomFemaleName(): string
    {
        return $this->possibleFemaleNames[rand(0, count($this->possibleFemaleNames) - 1)];
    }

    private function getRandomMaleName(): string
    {
        return $this->possibleMaleNames[rand(0, count($this->possibleMaleNames) - 1)];
    }

    /**
     * get a random gender
     * @return string gender 
     */
    private function getRandomGender(): string
    {
        return $this->possibleGenders[rand(0, count($this->possibleGenders) - 1)];
    }

    /**
     * get a random hair color
     * @return string css color name
     */
    private function getRandomHairColor(): string
    {
        return $this->possibleHairColors[rand(0, count($this->possibleHairColors) - 1)];
    }

    /**
     * set possible hair colors
     * @param array $hairColors
     */
    private function setPossibleHairColors(array $hairColors)
    {
        $this->possibleHairColors = $hairColors;
    }

    /**
     * get a random skin color
     * @return string css color name
     */
    private function getRandomSkinColor(): string
    {
        return $this->possibleSkinColors[rand(0, count($this->possibleSkinColors) - 1)];
    }

    /**
     * set possible skin colors
     * @param array $skinColors
     */
    private function setPossibleSkinColors(array $skinColors)
    {
        $this->possibleSkinColors = $skinColors;
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

        return '<img width="128" height="128" src="http://randomuser.me/api/portraits/'.$_gender.'/'.$_random_number.'.jpg" />';
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
            <svg height="'.$humanSizePixels.'" width="100%">
                
                <!-- left leg -->
                <line 
                    x1="160" 
                    y1="'.($hairSizePixels + $headSizePixels + $bodySizePixels - $proportions).'" 
                    x2="'.(160 + $proportions).'" 
                    y2="'.($hairSizePixels + $headSizePixels + $bodySizePixels + $legsSizePixels).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="'.$armsAndLegsThicknessPixels.'" 
                />
                
                <!-- right leg -->
                <line 
                    x1="140" 
                    y1="'.($hairSizePixels + $headSizePixels + $bodySizePixels - $proportions).'" 
                    x2="'.(140 - $proportions).'" 
                    y2="'.($hairSizePixels + $headSizePixels + $bodySizePixels + $legsSizePixels).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="'.$armsAndLegsThicknessPixels.'" 
                /> 
                
                <!-- right arm -->
                <line 
                    x1="'.(150 + $armsSizePixels).'" 
                    y1="'.($hairSizePixels + $headSizePixels + $bodySizePixels / 2 - $armsSizePixels).'" 
                    x2="150" 
                    y2="'.($hairSizePixels + $headSizePixels + $bodySizePixels / 2).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="'.$armsAndLegsThicknessPixels.'" 
                />
                
                <!-- left arm -->
                <line 
                    x1="'.(150 - $armsSizePixels).'" 
                    y1="'.($hairSizePixels + $headSizePixels + $bodySizePixels / 2 - $armsSizePixels).'" 
                    x2="150" 
                    y2="'.($hairSizePixels + $headSizePixels + $bodySizePixels / 2).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="'.$armsAndLegsThicknessPixels.'"
                />
                
                <!-- body -->
                <ellipse 
                    cx="150" 
                    cy="'.($bodySizePixels / 2 + $hairSizePixels + $headSizePixels).'" 
                    rx="'.(round($bodySizePixels / 4) * $bodyMassIndexPixels).'" 
                    ry="'.($bodySizePixels / 2).'" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->skinColor.'" 
                />

                <!-- head -->
                <circle 
                    cx="150" 
                    cy="'.($headSizePixels / 2 + $hairSizePixels).'" 
                    r="'.($headSizePixels / 2).'" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->skinColor.'" 
                />

                <!-- left eye -->
                <ellipse 
                    cx="135" 
                    cy="'.(5 + $hairSizePixels).'" 
                    rx="8" 
                    ry="4" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->eyeColor.'" 
                />

                <!-- right eye -->
                <ellipse 
                    cx="165" 
                    cy="'.(5 + $hairSizePixels).'" 
                    rx="8" 
                    ry="4" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->eyeColor.'" 
                />

                <!-- mouth -->
                <ellipse 
                    cx="150" 
                    cy="'.(25 + $hairSizePixels).'" 
                    rx="15" 
                    ry="7" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="red" 
                />

                <!-- hair -->
                <path 
                    d="M208,'.$hairSizePixels.' a30,30 0 1,0 -115,0" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->hairColor.'" 
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
        foreach([
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
            if ($dxa > (++$uy < 10 ? '0' : '')."$uy-$v") {
                $zodiac = $k;
            }
        } 
        return $zodiac ?? 'Capricorn';
    }

    /**
     * add a skill
     * @param string possible skill name
     */
    public function addSkill(string $skill)
    {
        if (!in_array($skill, $this->skills))
            $this->skills[] = $skill;
    }

    /**
     * add a softskill
     * @param string possible skill name
     */
    public function addSoftSkill(string $softSkill)
    {
        if (!in_array($softSkill, $this->softSkills))
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
