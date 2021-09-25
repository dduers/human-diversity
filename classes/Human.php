<?php
declare(strict_types=1);

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
