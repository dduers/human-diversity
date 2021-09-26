<?php
declare(strict_types=1);

/**
 * this describes a human beeing
 */
class Human 
{
    /**
     * properties 
     */
    private string $name;
    private DateTime $birthday;
    private int $sizeCentimeters;
    private int $weightKilograms;
    private string $eyeColor;
    private string $hairColor;
    private string $skinColor;
    private array $skills;
    private array $softSkills;

    /**
     * constants
     */
    private const MAX_BODY_SIZE = 250;
    private const MIN_BODY_SIZE = 50;
    private const MAX_WEIGHT = 180;
    private const MIN_WEIGHT = 3;
    private const POSSIBLE_SKILLS = [
        'Cooking',
        'Hacker',
        'Gardener',
        'Parenting',
        'Shopper',
        'Accountant',
        'Actor',
        'Administrator',
        'Aerospace Engineer',
        'Agricultural Engineer',
        'Anthropologist',
        'Architect',
        'Astronomer',
        'Auditor',
        'Banking Analyst',
        'Bartender',
        'Biologist',
        'Blacksmiths',
        'Broker',
        'Buyer',
        'Carpenter',
        'Chef',
        'Chemist',
        'Childcare Worker',
        'Civil Engineer',
        'Clergy',
        'Computer Scientist',
        'Conservation Worker',
        'Construction Worker',
        'Cook',
        'Cosmetologist',
        'Craftsperson',
        'Customer Experience Design',
        'Data Analyst',
        'Data Scientist',
        'Dental Assistant',
        'Development Manager',
        'Ecommerce Seller',
        'Electrical Engineer',
        'Emergency Medical Technician',
        'Engineer',
        'Environmental Engineer',
        'Epidemiologist',
        'Event Planner',
        'Farmer',
        'Financial Analyst',
        'Financial Manager',
        'Fishery Worker',
        'Flight Attendant',
        'Forestry Worker',
        'Game Designer',
        'General Manager',
        'Government Worker',
        'Health Educator',
        'Hotel Manager',
        'Import/Export Specialist',
        'Information Design',
        'Information Technology Manager',
        'Interpreter',
        'Laboratory Technician',
        'Landscape Architect',
        'Lawyer',
        'Librarian',
        'Logistics Engineer',
        'Manicurists',
        'Manufacturing Worker',
        'Mathematician',
        'Medical Administration',
        'Medical Technician',
        'Mental Health Counselor',
        'Miner',
        'Nanny',
        'Nurse',
        'Occupational Therapist',
        'Operations Analyst',
        'Optometrist',
        'Personal Care Aid',
        'Photographer',
        'Physicist',
        'Plumber',
        'Politician',
        'Product Design',
        'Professor',
        'Project Manager',
        'Property Manager',
        'Purchasing Manager',
        'Quality Control Analyst',
        'Reporter',
        'Restaurant Manager',
        'Robotics Engineer',
        'Sales Manager',
        'Scientist',
        'Service Manager',
        'Small Business Owner',
        'Sociologist',
        'Software Developer',
        'Space Scientist',
        'Steel Worker',
        'Supervisor',
        'Surveyor',
        'Systems Analyst',
        'Teacher',
        'Technical Writer',
        'Technology Architect',
        'Tour Guide',
        'Transportation Engineer',
        'Tutor',
        'Veterinarian',
        'Waiter',
        'Wind Energy Engineer',
        'Zoologist',
        'Accountant',
        'Actuary',
        'Advertising Manager',
        'Agent',
        'Air Traffic Controller',
        'Archeologist',
        'Art Director',
        'Athlete',
        'Baker',
        'Barista',
        'Bioinformatics Scientist',
        'Biomedical Engineer',
        'Board Member',
        'Business Analyst',
        'Captain (naval)',
        'Cashier',
        'Chemical Engineer',
        'Chief Executive',
        'Choreographer',
        'Cleaner',
        'Compliance Manager',
        'Concierge',
        'Construction Manager',
        'Consultant',
        'Copywriter',
        'Courier',
        'Curator',
        'Customer Service',
        'Data Architect',
        'Database Administrator',
        'Dentist',
        'Director',
        'Economist',
        'Electrician',
        'Energy Engineer',
        'Entrepreneur',
        'Environmental Science',
        'Equipment Operator',
        'Executive Management',
        'Fashion Designer',
        'Financial Controller',
        'Firefighter',
        'Fitness Trainer',
        'Floral Designer',
        'Funeral Attendant',
        'Gardener',
        'Geographer',
        'Hair Stylist',
        'Homemaker',
        'Human Resources',
        'Industrial Design',
        'Information Scientist',
        'Installation & Maintenance',
        'Journalist',
        'Laborer',
        'Landscaping',
        'Legal Secretary',
        'Lifeguard',
        'Management Consultant',
        'Manufacturing Engineer',
        'Marketing Analyst',
        'Mechanical Engineer',
        'Medical Assistant',
        'Medical Technologist',
        'Midwife',
        'Musician',
        'Network Administrator',
        'Occupational Health & Safety',
        'Office Clerk',
        'Operations Manager',
        'Performance Artist',
        'Pharmacist',
        'Physician',
        'Pilot',
        'Police Officer',
        'Producer',
        'Production Manager',
        'Program Manager',
        'Promotion Manager',
        'Public Relations',
        'Quality Assurance Manager',
        'Railroad Engineer',
        'Researcher',
        'Rigger',
        'Sales Engineer',
        'Salesperson',
        'Service Attendant',
        'Shop Salesperson',
        'Social Worker',
        'Software Architect',
        'Solar Energy Technician',
        'Statistician',
        'Stonemason',
        'Surgeon',
        'System Administrator',
        'Tailor',
        'Technical Support',
        'Technician',
        'Testing Engineer',
        'Translator',
        'Truck Driver',
        'Urban Design',
        'Visual Designer',
        'Web Developer',
        'Writer',        
    ];
    private const POSSIBLE_SKIN_COLORS = [
        'aqua',
        'black',
        'blue',
        'fuchsia',
        'gray',
        'green',
        'lime',
        'maroon',
        'navy',
        'olive',
        'purple',
        'red',
        'silver',
        'teal',
        'white',
        'yellow',
        'aliceblue',
        'antiquewhite',
        'aqua',
        'aquamarine',
        'azure',
        'beige',
        'bisque',
        'black',
        'blanchedalmond',
        'blue',
        'blueviolet',
        'brown',
        'burlywood',
        'cadetblue',
        'chartreuse',
        'chocolate',
        'coral',
        'cornflowerblue',
        'cornsilk',
        'crimson',
        'cyan',
        'darkblue',
        'darkcyan',
        'darkgoldenrod',
        'darkgray',
        'darkgreen',
        'darkkhaki',
        'darkmagenta',
        'darkolivegreen',
        'darkorange',
        'darkorchid',
        'darkred',
        'darksalmon',
        'darkseagreen',
        'darkslateblue',
        'darkslategray',
        'darkturquoise',
        'darkviolet',
        'deeppink',
        'deepskyblue',
        'dimgray',
        'dodgerblue',
        'firebrick',
        'floralwhite',
        'forestgreen',
        'fuchsia',
        'gainsboro',
        'ghostwhite',
        'gold',
        'goldenrod',
        'gray',
        'green',
        'greenyellow',
        'honeydew',
        'hotpink',
        'indianred',
        'indigo',
        'ivory',
        'khaki',
        'lavender',
        'lavenderblush',
        'lawngreen',
        'lemonchiffon',
        'lightblue',
        'lightcoral',
        'lightcyan',
        'lightgoldenrodyellow',
        'lightgreen',
        'lightgrey',
        'lightpink',
        'lightsalmon',
        'lightseagreen',
        'lightskyblue',
        'lightslategray',
        'lightsteelblue',
        'lightyellow',
        'lime',
        'limegreen',
        'linen',
        'magenta',
        'maroon',
        'mediumaquamarine',
        'mediumblue',
        'mediumorchid',
        'mediumpurple',
        'mediumseagreen',
        'mediumslateblue',
        'mediumspringgreen',
        'mediumturquoise',
        'mediumvioletred',
        'midnightblue',
        'mintcream',
        'mistyrose',
        'moccasin',
        'navajowhite',
        'navy',
        'navyblue',
        'oldlace',
        'olive',
        'olivedrab',
        'orange',
        'orangered',
        'orchid',
        'palegoldenrod',
        'palegreen',
        'paleturquoise',
        'palevioletred',
        'papayawhip',
        'peachpuff',
        'peru',
        'pink',
        'plum',
        'powderblue',
        'purple',
        'red',
        'rosybrown',
        'royalblue',
        'saddlebrown',
        'salmon',
        'sandybrown',
        'seagreen',
        'seashell',
        'sienna',
        'silver',
        'skyblue',
        'slateblue',
        'slategray',
        'snow',
        'springgreen',
        'steelblue',
        'tan',
        'teal',
        'thistle',
        'tomato',
        'turquoise',
        'violet',
        'wheat',
        'white',
        'whitesmoke',
        'yellow',
        'yellowgreen',
    ];
    private const POSSIBLE_HAIR_COLORS = [
        'aqua',
        'black',
        'blue',
        'fuchsia',
        'gray',
        'green',
        'lime',
        'maroon',
        'navy',
        'olive',
        'purple',
        'red',
        'silver',
        'teal',
        'white',
        'yellow',
        'aliceblue',
        'antiquewhite',
        'aqua',
        'aquamarine',
        'azure',
        'beige',
        'bisque',
        'black',
        'blanchedalmond',
        'blue',
        'blueviolet',
        'brown',
        'burlywood',
        'cadetblue',
        'chartreuse',
        'chocolate',
        'coral',
        'cornflowerblue',
        'cornsilk',
        'crimson',
        'cyan',
        'darkblue',
        'darkcyan',
        'darkgoldenrod',
        'darkgray',
        'darkgreen',
        'darkkhaki',
        'darkmagenta',
        'darkolivegreen',
        'darkorange',
        'darkorchid',
        'darkred',
        'darksalmon',
        'darkseagreen',
        'darkslateblue',
        'darkslategray',
        'darkturquoise',
        'darkviolet',
        'deeppink',
        'deepskyblue',
        'dimgray',
        'dodgerblue',
        'firebrick',
        'floralwhite',
        'forestgreen',
        'fuchsia',
        'gainsboro',
        'ghostwhite',
        'gold',
        'goldenrod',
        'gray',
        'green',
        'greenyellow',
        'honeydew',
        'hotpink',
        'indianred',
        'indigo',
        'ivory',
        'khaki',
        'lavender',
        'lavenderblush',
        'lawngreen',
        'lemonchiffon',
        'lightblue',
        'lightcoral',
        'lightcyan',
        'lightgoldenrodyellow',
        'lightgreen',
        'lightgrey',
        'lightpink',
        'lightsalmon',
        'lightseagreen',
        'lightskyblue',
        'lightslategray',
        'lightsteelblue',
        'lightyellow',
        'lime',
        'limegreen',
        'linen',
        'magenta',
        'maroon',
        'mediumaquamarine',
        'mediumblue',
        'mediumorchid',
        'mediumpurple',
        'mediumseagreen',
        'mediumslateblue',
        'mediumspringgreen',
        'mediumturquoise',
        'mediumvioletred',
        'midnightblue',
        'mintcream',
        'mistyrose',
        'moccasin',
        'navajowhite',
        'navy',
        'navyblue',
        'oldlace',
        'olive',
        'olivedrab',
        'orange',
        'orangered',
        'orchid',
        'palegoldenrod',
        'palegreen',
        'paleturquoise',
        'palevioletred',
        'papayawhip',
        'peachpuff',
        'peru',
        'pink',
        'plum',
        'powderblue',
        'purple',
        'red',
        'rosybrown',
        'royalblue',
        'saddlebrown',
        'salmon',
        'sandybrown',
        'seagreen',
        'seashell',
        'sienna',
        'silver',
        'skyblue',
        'slateblue',
        'slategray',
        'snow',
        'springgreen',
        'steelblue',
        'tan',
        'teal',
        'thistle',
        'tomato',
        'turquoise',
        'violet',
        'wheat',
        'white',
        'whitesmoke',
        'yellow',
        'yellowgreen',
    ];
    private const POSSIBLE_EYE_COLORS = [
        'aqua',
        'black',
        'blue',
        'fuchsia',
        'gray',
        'green',
        'lime',
        'maroon',
        'navy',
        'olive',
        'purple',
        'red',
        'silver',
        'teal',
        'white',
        'yellow',
        'aliceblue',
        'antiquewhite',
        'aqua',
        'aquamarine',
        'azure',
        'beige',
        'bisque',
        'black',
        'blanchedalmond',
        'blue',
        'blueviolet',
        'brown',
        'burlywood',
        'cadetblue',
        'chartreuse',
        'chocolate',
        'coral',
        'cornflowerblue',
        'cornsilk',
        'crimson',
        'cyan',
        'darkblue',
        'darkcyan',
        'darkgoldenrod',
        'darkgray',
        'darkgreen',
        'darkkhaki',
        'darkmagenta',
        'darkolivegreen',
        'darkorange',
        'darkorchid',
        'darkred',
        'darksalmon',
        'darkseagreen',
        'darkslateblue',
        'darkslategray',
        'darkturquoise',
        'darkviolet',
        'deeppink',
        'deepskyblue',
        'dimgray',
        'dodgerblue',
        'firebrick',
        'floralwhite',
        'forestgreen',
        'fuchsia',
        'gainsboro',
        'ghostwhite',
        'gold',
        'goldenrod',
        'gray',
        'green',
        'greenyellow',
        'honeydew',
        'hotpink',
        'indianred',
        'indigo',
        'ivory',
        'khaki',
        'lavender',
        'lavenderblush',
        'lawngreen',
        'lemonchiffon',
        'lightblue',
        'lightcoral',
        'lightcyan',
        'lightgoldenrodyellow',
        'lightgreen',
        'lightgrey',
        'lightpink',
        'lightsalmon',
        'lightseagreen',
        'lightskyblue',
        'lightslategray',
        'lightsteelblue',
        'lightyellow',
        'lime',
        'limegreen',
        'linen',
        'magenta',
        'maroon',
        'mediumaquamarine',
        'mediumblue',
        'mediumorchid',
        'mediumpurple',
        'mediumseagreen',
        'mediumslateblue',
        'mediumspringgreen',
        'mediumturquoise',
        'mediumvioletred',
        'midnightblue',
        'mintcream',
        'mistyrose',
        'moccasin',
        'navajowhite',
        'navy',
        'navyblue',
        'oldlace',
        'olive',
        'olivedrab',
        'orange',
        'orangered',
        'orchid',
        'palegoldenrod',
        'palegreen',
        'paleturquoise',
        'palevioletred',
        'papayawhip',
        'peachpuff',
        'peru',
        'pink',
        'plum',
        'powderblue',
        'purple',
        'red',
        'rosybrown',
        'royalblue',
        'saddlebrown',
        'salmon',
        'sandybrown',
        'seagreen',
        'seashell',
        'sienna',
        'silver',
        'skyblue',
        'slateblue',
        'slategray',
        'snow',
        'springgreen',
        'steelblue',
        'tan',
        'teal',
        'thistle',
        'tomato',
        'turquoise',
        'violet',
        'wheat',
        'white',
        'whitesmoke',
        'yellow',
        'yellowgreen',
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
    
    /**
     * human class constructor
     * @param string $name name
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
        string $name, 
        ?string $birthday = NULL, 
        ?int $sizeCentimeters = NULL, 
        ?int $weightKilograms = NULL, 
        ?array $skills = NULL,
        ?array $softSkills = NULL,
        ?string $eyeColor = NULL, 
        ?string $hairColor = NULL, 
        ?string $skinColor = NULL
    ) {
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
            $possibleSkill = self::POSSIBLE_SKILLS[rand(0, count(self::POSSIBLE_SKILLS) - 1)];
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
            $possibleSoftSkill = self::POSSIBLE_SOFTSKILLS[rand(0, count(self::POSSIBLE_SOFTSKILLS) - 1)];
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
        return self::POSSIBLE_EYE_COLORS[rand(0, count(self::POSSIBLE_EYE_COLORS) - 1)];
    }

    /**
     * get a random hair color
     * @return string css color name
     */
    private function getRandomHairColor(): string
    {
        return self::POSSIBLE_HAIR_COLORS[rand(0, count(self::POSSIBLE_HAIR_COLORS) - 1)];
    }

    /**
     * get a random skin color
     * @return string css color name
     */
    private function getRandomSkinColor(): string
    {
        return self::POSSIBLE_SKIN_COLORS[rand(0, count(self::POSSIBLE_SKIN_COLORS) - 1)];
    }

    /**
     * get svg full body image depending on human properties
     * @return string svg image code
     */
    public function getFullBodyImage(): string
    {
        $bodyMassIndex = $this->getBodyMassIndex();
        $humanSize = $this->getSizeInCentimeters();

        $humanSizePixels = $humanSize * 2;

        $proportions = round($humanSizePixels / 10); 
        $headSizePixels = $proportions * 1;
        $bodySizePixels = $proportions * 4;
        $legsSizePixels = $proportions * 5;
        $armsSizePixels = $proportions * 4;

        $svg = '
            <svg height="'.$humanSizePixels.'" width="500">
                
                <!-- left leg -->
                <line 
                    x1="160" 
                    y1="'.($headSizePixels + $bodySizePixels - $proportions).'" 
                    x2="'.(160 + $proportions).'" 
                    y2="'.($headSizePixels + $bodySizePixels + $legsSizePixels).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="10" 
                />
                
                <!-- right leg -->
                <line 
                    x1="140" 
                    y1="'.($headSizePixels + $bodySizePixels - $proportions).'" 
                    x2="'.(140 - $proportions).'" 
                    y2="'.($headSizePixels + $bodySizePixels + $legsSizePixels).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="10" 
                /> 
                
                <!-- right arm -->
                <line 
                    x1="'.(150 + $armsSizePixels).'" 
                    y1="'.($headSizePixels + $bodySizePixels / 2 - $armsSizePixels).'" 
                    x2="150" 
                    y2="'.($headSizePixels + $bodySizePixels / 2).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="10" 
                />
                
                <!-- left arm -->
                <line 
                    x1="'.(150 - $armsSizePixels).'" 
                    y1="'.($headSizePixels + $bodySizePixels / 2 - $armsSizePixels).'" 
                    x2="150" 
                    y2="'.($headSizePixels + $bodySizePixels / 2).'" 
                    stroke="'.$this->skinColor.'" 
                    stroke-width="10" d
                />
                
                <!-- body -->
                <ellipse 
                    cx="150" 
                    cy="'.($bodySizePixels / 2 + $headSizePixels).'" 
                    rx="'.round($bodySizePixels / 4).'" 
                    ry="'.($bodySizePixels / 2).'" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->skinColor.'" 
                />

                <!-- head -->
                <circle 
                    cx="150" 
                    cy="'.($headSizePixels / 2).'" 
                    r="'.($headSizePixels / 2).'" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->skinColor.'" 
                />

                <!-- left eye -->
                <ellipse 
                    cx="135" 
                    cy="35" 
                    rx="8" 
                    ry="4" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->eyeColor.'" 
                />

                <!-- right eye -->
                <ellipse 
                    cx="165" 
                    cy="35" 
                    rx="8" 
                    ry="4" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="'.$this->eyeColor.'" 
                />

                <!-- mouth -->
                <ellipse 
                    cx="150" 
                    cy="63" 
                    rx="15" 
                    ry="7" 
                    stroke="black" 
                    stroke-width="1" 
                    fill="red" 
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
