<?php

$femaleNames = [
    'Olivia',
    'Emma',
    'Ava',
    'Charlotte',
    'Sophia',
    'Amelia',
    'Isabella',
    'Mia',
    'Evelyn',
    'Harper',
    'Camila',
    'Gianna',
    'Abigail',
    'Luna',
    'Ella',
    'Elizabeth',
    'Sofia',
    'Emily',
    'Avery',
    'Mila',
    'Scarlett',
    'Eleanor',
    'Madison',
    'Layla',
    'Penelope',
    'Aria',
    'Chloe',
    'Grace',
    'Ellie',
    'Nora',
    'Hazel',
    'Zoey',
    'Riley',
    'Victoria',
    'Lily',
    'Aurora',
    'Violet',
    'Nova',
    'Hannah',
    'Emilia',
    'Zoe',
    'Stella',
    'Everly',
    'Isla',
    'Leah',
    'Lillian',
    'Addison',
    'Willow',
    'Lucy',
    'Paisley',
    'Natalie',
    'Naomi',
    'Eliana',
    'Brooklyn',
    'Elena',
    'Aubrey',
    'Claire',
    'Ivy',
    'Kinsley',
    'Audrey',
    'Maya',
    'Genesis',
    'Skylar',
    'Bella',
    'Aaliyah',
    'Madelyn',
    'Savannah',
    'Anna',
    'Delilah',
    'Serenity',
    'Caroline',
    'Kennedy',
    'Valentina',
    'Ruby',
    'Sophie',
    'Alice',
    'Gabriella',
    'Sadie',
    'Ariana',
    'Allison',
    'Hailey',
    'Autumn',
    'Nevaeh',
    'Natalia',
    'Quinn',
    'Josephine',
    'Sarah',
    'Cora',
    'Emery',
    'Samantha',
    'Piper',
    'Leilani',
    'Eva',
    'Everleigh',
    'Madeline',
    'Lydia',
    'Jade',
    'Peyton',
    'Brielle',
    'Adeline',
];

$maleNames = [
    'Liam',
    'Noah',
    'Oliver',
    'Elijah',
    'William',
    'James',
    'Benjamin',
    'Lucas',
    'Henry',
    'Alexander',
    'Mason',
    'Michael',
    'Ethan',
    'Daniel',
    'Jacob',
    'Logan',
    'Jackson',
    'Levi',
    'Sebastian',
    'Mateo',
    'Jack',
    'Owen',
    'Theodore',
    'Aiden',
    'Samuel',
    'Joseph',
    'John',
    'David',
    'Wyatt',
    'Matthew',
    'Luke',
    'Asher',
    'Carter',
    'Julian',
    'Grayson',
    'Leo',
    'Jayden',
    'Gabriel',
    'Isaac',
    'Lincoln',
    'Anthony',
    'Hudson',
    'Dylan',
    'Ezra',
    'Thomas',
    'Charles',
    'Christopher',
    'Jaxon',
    'Maverick',
    'Josiah',
    'Isaiah',
    'Andrew',
    'Elias',
    'Joshua',
    'Nathan',
    'Caleb',
    'Ryan',
    'Adrian',
    'Miles',
    'Eli',
    'Nolan',
    'Christian',
    'Aaron',
    'Cameron',
    'Ezekiel',
    'Colton',
    'Luca',
    'Landon',
    'Hunter',
    'Jonathan',
    'Santiago',
    'Axel',
    'Easton',
    'Cooper',
    'Jeremiah',
    'Angel',
    'Roman',
    'Connor',
    'Jameson',
    'Robert',
    'Greyson',
    'Jordan',
    'Ian',
    'Carson',
    'Jaxson',
    'Leonardo',
    'Nicholas',
    'Dominic',
    'Austin',
    'Everett',
    'Brooks',
    'Xavier',
    'Kai',
    'Jose',
    'Parker',
    'Adam',
    'Jace',
    'Wesley',
    'Kayden',
    'Silas',
];


$humans = [];

// create humans
for ($i = 0; $i < 15; $i++) {
    if (rand(0, 1) === 1) {
        $name = $femaleNames[rand(0, count($femaleNames) - 1)];
        $humans[] = new Woman($name);
    } else {
        $name = $maleNames[rand(0, count($maleNames) - 1)];
        $humans[] = new Man($name);
    }
}

echo 
    '<style>
        * {
            font-family: Tahoma, Arial;
        }
        body {
            margin: 0 auto;
            width: 75%;
            padding: 50px;
        }
        td {
            border: 1px solid black;
            padding: 5px;
        }
        table {
            border-collapse: collapse;
            border: 3px solid black;
            width: 100%;
        }
        .female {
            background-color: pink;
            border-bottom: 3px solid black;
        }
        .male {
            background-color: lightblue;
            border-bottom: 3px solid black;
        }
        .property {
            width: 250px;
        }
        .color {
            width:50px;
        }
    </style>';

echo '<body>';

// output human properties
$totalAge = 0;
$i = 0;
foreach ($humans as $human1) {
    $totalAge += $human1->getAgeInYears();
    $i++;
    echo 
        '<h3>Human #'.$i.'</h3>
        <table>
            <tr><td class="property '.($human1->getGender() === 'female' ? 'female' : 'male').'">Name</td><td colspan="2" class="'.($human1->getGender() === 'female' ? 'female' : 'male').'">'.$human1->getName().'</td></tr>
            <tr><td class="property">Gender</td><td colspan="2">'.$human1->getGender().'</td></tr>
            <tr><td class="property">Birthday</td><td colspan="2">'.$human1->getBirthday().'</td></tr>
            <tr><td class="property">Age</td><td colspan="2">'.$human1->getAgeInYears().' years</td></tr>
            <tr><td class="property">Size</td><td colspan="2">'.($human1->getSizeInCentimeters() / 100).' meters</td></tr>
            <tr><td class="property">Weight</td><td colspan="2">'.$human1->getWeightInKilograms().' kilograms</td></tr>
            <tr><td class="property">Skills</td><td colspan="2">'.implode(', ', $human1->getSkills()).'</td></tr>
            <tr><td class="property">Soft-Skills</td><td colspan="2">'.implode(', ', $human1->getSoftSkills()).'</td></tr>
            <tr><td class="property">Body-Mass-Index</td><td colspan="2">'.$human1->getBodyMassIndex().'</td></tr>
            <tr><td class="property">Eye-Color</td><td class="color" style="background-color:'.$human1->getEyeColor().';"></td><td></td></tr>
            <tr><td class="property">Hair-Color</td><td class="color" style="background-color:'.$human1->getHairColor().';"></td><td></td></tr>
            <tr><td class="property">Skin-Color</td><td class="color" style="background-color:'.$human1->getSkinColor().';"></td><td></td></tr>
        </table><br/>';
}

echo "<br/>Avarage Age: ".round($totalAge / count($humans), 2);

echo '</body>';


class Human 
{
    private string $name;
    private DateTime $birthday;
    private int $sizeCentimeters;
    private int $weightKilograms;
    private string $eyeColor;
    private string $hairColor;
    private string $skinColor;
    private array $skills;
    private array $softSkills;

    private const POSSIBLE_SKILLS = [
        'Cooking',
        'Hacking',
        'Gardening',
        'Parenting',
        'Shopping',
    ];

    private const POSSIBLE_SOFTSKILLS = [
        'Confidence',
        'Cooperation',
        'Courtesy',
        'Energy',
        'Enthusiasm',
        'Friendliness',
        'Honesty',
        'Humorous',
        'Patience',
        'Respectability',
        'Respectfulness',
        'Listening',
        'Negotiation',
        'Nonverbal communication',
        'Persuasion',
        'Presentation',
        'Public speaking',
        'Reading body language',
        'Social skills',
        'Storytelling',
        'Verbal communication',
        'Visual communication',
        'Writing skills',
        'Dealing with difficult situations',
        'Empathy',
        'Influence',
        'Networking',
        'Persuasion',
    ];
    
    function __construct(
        string $name, 
        ?string $birthday = NULL, 
        ?int $sizeCentimeters = NULL, 
        ?int $weightKilograms = NULL, 
        ?array $skills = NULL,
        ?array $softSkills = NULL,
        ?int $eyeColor = NULL, 
        ?int $hairColor = NULL, 
        ?array $skinColor = NULL
    ) {
        $this->name = $name;

        if (!$birthday) {
            $birthday = $this->createRandomBirthday();
        } 
        $this->birthday = new DateTime($birthday);

        if (!$sizeCentimeters) {
            $sizeCentimeters = $this->createRandomNumber(50, 230);
        }
        $this->sizeCentimeters = $sizeCentimeters;

        if (!$weightKilograms) {
            $weightKilograms = $this->createRandomNumber(3, 130);
        }
        $this->weightKilograms = $weightKilograms;

        if (!$skills) {
            $skills = $this->createRandomSkills();
        }
        $this->skills = $skills;

        if (!$softSkills) {
            $softSkills = $this->createRandomSoftSkills();
        }
        $this->softSkills = $softSkills;

        if (!$eyeColor) {
            $eyeColor = $this->createRandomColor();
        }
        $this->eyeColor = $eyeColor;

        if (!$hairColor) {
            $hairColor = $this->createRandomColor();
        }
        $this->hairColor = $hairColor;

        if (!$skinColor) {
            $skinColor = $this->createRandomColor();
        }
        $this->skinColor = $skinColor;
    }

    private function createRandomSkills(): array
    {
        $skills = [];
        for ($i = 0; $i < rand(2, 5); $i++) {
            $possibleSkill = self::POSSIBLE_SKILLS[rand(0, count(self::POSSIBLE_SKILLS) - 1)];
            if (!in_array($possibleSkill, $skills)) {
                $skills[] = $possibleSkill;
            }
        }
        return $skills;
    }

    public function createRandomSoftSkills(): array
    {
        $softSkills = [];
        for ($i = 0; $i < rand(2, 5); $i++) {
            $possibleSoftSkill = self::POSSIBLE_SOFTSKILLS[rand(0, count(self::POSSIBLE_SOFTSKILLS) - 1)];
            if (!in_array($possibleSoftSkill, $softSkills)) {
                $softSkills[] = $possibleSoftSkill;
            }
        }
        return $softSkills;
    }

    private function createRandomBirthday(): string
    {
        $day = rand(1, 28);
        $month = rand(1, 12);
        $maxYear = date('Y') - 1;
        $year = rand(1920, $maxYear);
        return $year.'-'.$month.'-'.$day;
    }

    private function createRandomColor(): string
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    private function createRandomNumber($min, $max): int
    {
        return rand($min, $max);
    }

    public function addSkill(string $skill)
    {
        if (!in_array($skill, $this->skills)) {
            $this->skills[] = $skill;
        }
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

    public function getSoftSkills(): array
    {
        return $this->softSkills;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAgeInYears(): int
    {
        $now = new DateTime();
        $age = date_diff($this->birthday, $now);
        return (int)$age->format('%y');
    }

    public function getSizeInCentimeters(): int
    {
        return $this->sizeCentimeters;
    }

    public function getWeightInKilograms(): int
    {
        return $this->weightKilograms;
    }

    public function getBirthday(): string
    {
        return $this->birthday->format('l, j. F Y');
    }

    public function getEyeColor(): string
    {
        return $this->eyeColor;
    }

    public function getHairColor(): string
    {
        return $this->hairColor;
    }

    public function getSkinColor(): string
    {
        return $this->skinColor;
    }
}




final class Woman extends Human 
{
    //placeholder :)
    //private int $breastSizeCentimeters;

    public function getGender(): string
    {
        return 'female';
    }
}


final class Man extends Human
{
    //placeholder :)
    //private int $dickSizeCentimeters;

    public function getGender(): string
    {
        return 'male';
    }
}
