<?php
declare(strict_types=1);

namespace Dduers\HumanDiversity;

/**
 * this describes a human beeing
 */
class Human 
{
    /**
     * properties 
     */
    private string $name;
    private string $gender;
    private \DateTime $birthday;
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
    private const POSSIBLE_GENDERS = [
        'male',
        'female',
    ];

    /**
     * list of possible female names
     */
    private const POSSIBLE_FEMALE_NAMES = [
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

    /**
     * list of possible male names
     */
    private const POSSIBLE_MALE_NAMES = [
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

    /**
     * list of possible skills
     */
    private array $possibleSkills = [
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

    /**
     * possible skin colors
     */
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

    /**
     * list of possible hair colors
     */
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

    /**
     * list of possible eye colors
     */
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

    private array $possibleSoftSkills = [
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
        $this->birthday = new \DateTime($birthday);

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
        return self::POSSIBLE_EYE_COLORS[rand(0, count(self::POSSIBLE_EYE_COLORS) - 1)];
    }

    private function getRandomFemaleName(): string
    {
        return self::POSSIBLE_FEMALE_NAMES[rand(0, count(self::POSSIBLE_FEMALE_NAMES) - 1)];
    }

    private function getRandomMaleName(): string
    {
        return self::POSSIBLE_MALE_NAMES[rand(0, count(self::POSSIBLE_MALE_NAMES) - 1)];
    }

    /**
     * get a random gender
     * @return string gender 
     */
    private function getRandomGender(): string
    {
        return self::POSSIBLE_GENDERS[rand(0, count(self::POSSIBLE_GENDERS) - 1)];
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
        $humanSize = $this->getSizeInCentimeters();

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
        $now = new \DateTime();
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

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $gender = strtolower($gender);
        if (in_array($gender, self::POSSIBLE_GENDERS)) {
            $this->gender = $gender;
        } else {
            throw new \Exception('UNKNOWN_GENDER');
        }
    }        
}
