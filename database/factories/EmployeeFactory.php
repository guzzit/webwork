<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Employee;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'DOB' => $faker->date('Y-m-d'),
        'gender' => RandomValue::gender(),
        'mobile_number' => RandomValue::mobile_number(),
        'job_sector' => RandomValue::job_vary()[0],
        'job_title' => RandomValue::get_job_array()[1],
        'five_tag_summation' => RandomValue::get_job_array()[2][0].RandomValue::get_job_array()[2][1].RandomValue::get_job_array()[2][2],
        'short_description' => $faker->paragraph(5),
        'highest_qualification' => RandomValue::highest_qualification(),
        'experience' => $faker->randomNumber(0,20),
        'relocation_willingness' => $faker->randomElement(['Yes', 'No']),
        'salary_range' => $faker->randomElement("NGN35,000 - NGN50,000",
                                                "NGN50,000 - NGN100,000",
                                                "NGN100,000 - NGN150,000", "NGN150,000 - NGN200,000",
                                                "NGN300,000 - NGN600,000","NGN600,000 and above"),
        'city' => $faker->randomElement(['Lagos','Abuja','Port Harcourt', 
                                        'Ibadan', 'Onitsha', 'Aba', 'Abeokuta',
                                        'Akure', 'Enugu', 'Jos', 'Kanu',
                                        'Uyo', 'Bornu', 'Benin', 'Ilorin',
                                        'Delta','Kwara', 'Calabar', 'Warri',
                                        'Ówerri']),
        'cv' => 'resume',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

class RandomValue{

    protected $genderProp = array("Male", "Female");
    protected $phonenumberProp = array(7017366000, 8017366001, 9017366002,
                         7017366003, 8017366004, 9017366005,
                         7017366006, 8017366007, 9017366008, 
                         7017366009, 8017366010, 9017366011,
                         7017366012, 8017366013, 9017366014,
                         7017366015, 8017366016, 9017366017,
                         7017366018, 8017366019, 9017366020,
                         7017366021, 8017366022, 9017366023,
                         7017366024, 8017366025, 9017366026,
                         7017366027, 8017366028, 9017366029,
                         7017366030, 9017366031);
    protected $highestQualProp = array("Secondary School Leaving Certificate",
                                        "Diploma","HND","OND",
                                        "BA/BSc","NCE","MBA/MSc",
                                        "MBBS","MPhil/PhD","Vocational");
    public static $job_array = array();
    protected $job_sectorProp = array("Accounting, Auditing, Finance","Administrative & Office Work",
                                "Agriculture and Farming","Building & Architecture",
                                "Community & Social Services","Consulting & Strategy",
                                "Creative & Design","Customer Service & Support",
                                "Engineering",
                                "Food Services & Catering","Health & Safety",
                                "Hospitality/Leisure/Travel","Human Reasources",
                                "IT & Software","Legal Services",
                                "Management & Business","Development",
                                "Marketing & Communications","Medical & Pharmaceutical",
                                "Natural Sciences","Project & Product Management",
                                "Quality Control & Assurance","Real Estate & Property Management",
                                "Research, Teaching & Training","Sales",
                                "Security","Supply Chain & Procurement",
                                "Trades & Services","Transport & Logistics");
    protected $job_varieties = array("Accounting, Auditing, Finance" => array("Accounting Clerk",
                                                                             "Accounts Payable/Receivable Clerk",
                                                                            "Accounting Information System Specialist",
                                                                            "Actuarial Accountant/Insurance Accountant",
                                                                            "Bookkeeping",
                                                                            "Budget Analyst Forensic Accountant",
                                                                            "Real Estate Appraiser",
                                                                            "Tax Accountant"),
                                        "Administrative & Office Work" => array("Accounting assistant",
                                                                                "Administrative assistant",
                                                                                "Administrative specialist",
                                                                                "Business center supervisor",
                                                                                "Equipment controller",
                                                                                "Executive assistant",
                                                                                "File clerk",
                                                                                "Human resources assistant",
                                                                                "Information management specialist",
                                                                                "Law IT administrative assistant",
                                                                                "Legal assistant",
                                                                                "Mail associate",
                                                                                "Management secretary"),
                                        "Agriculture and Farming" => array("Farm management",
                                                                            "Soil conservationist",
                                                                            "Extension advisor",
                                                                            "Structural engineer",
                                                                            "Irrigation engineer",
                                                                            "Sanitary/waste handling",
                                                                            "Food engineer",
                                                                            "Bioprocessing engineer"),    
                                        "Building & Architecture" => array("Architectural and Engineering Managers",
                                                                            "Construction and Building Inspector",
                                                                            "Construction Manager",
                                                                            "Drafter",
                                                                            "Industrial Designer",
                                                                            "Landscape Architect",
                                                                            "Surveying and Mapping Technician",
                                                                            "Surveyors",
                                                                            "Urban and Regional Planners"
                                                                             ),  
                                        "Community & Social Services" => array("Emergency Management Directors",
                                                                                "Health Worker",
                                                                                "Marriage Therapist",
                                                                                "Probation Officers",
                                                                                "Career Counselor",
                                                                                "Social Worker",
                                                                                "Mental Health Counselor",
                                                                                "Substance Abuse Counselor"),
                                        "Consulting & Strategy" => array("Supply chain manager",
                                                                        "Human resource manager",
                                                                        "Enterprise resource planner",
                                                                        "Management Consultant",
                                                                        "Management Analyst",
                                                                        "Financial Services Consultant",
                                                                        "Public Service Consultant",
                                                                        "Comminications Consultant"),
                                    "Creative & Design" => array("Graphics Designer", 
                                                                "Creative Director",
                                                                "Photographer",
                                                                "Interior Designer",
                                                                "Fashion Designer",
                                                                "Arts Director",
                                                                "Film and Video Editor",
                                                                "Game Designer",
                                                                "Animator"),
                                    "Customer Service & Support" => array("Call Center Agent",
                                                                        "Concierge",
                                                                        "Client Relations Associate",
                                                                        "Client Services Coordinator",
                                                                        "Customer Service Representative",
                                                                        "Receptionist",
                                                                        "Front Desk Associate",
                                                                        "Technical Support Representative",
                                                                         "Social Media Manager"),
                                 "Engineering"=> array("Civil Engineer",
                                                        "Mechanical Engineer",
                                                        "Electrical Engineer",
                                                        "Electronic Engineer",
                                                        "Robtics Engineer",
                                                        "Environmental Engineer",
                                                        "Biomedical Engineer",
                                                        "Aerospace Engineer",
                                                        "Chemical Engineer"),
                                "Food Services & Catering" => array("Chef",
                                                                    "Catering Manager",
                                                                    "Bartender",
                                                                    "Waitress/Waiter",
                                                                    "Baker",
                                                                    "Sales Manager",
                                                                    "Cook"),
                                "Health & Safety" => array("Safety Coordinator",
                                                            "Food Safety Adviser", 
                                                            "Environmental Scientists",
                                                            "Construction and Building Inspector",
                                                            "Fire Inspector",
                                                            "Safety Officer",
                                                            "Health Officer",
                                    ),
                                "Hospitality/Leisure/Travel" => array("Hotel Manager",
                                                                        "Bartender",
                                                                        "Waitress/Waiter",
                                                                        "Tour Guide",
                                                                        "Travel Agent",
                                                                        "Operations Insructor",
                                                                        "Sales Manager",
                                                                        "Guest Experience Manager"),
                    
                            "Human Reasources" => array("Administrative Services Manager",
                                                        "Compensation and Benefits Manager",
                                                        "Job Analysis Specialist",
                                                        "Human Resources Manager",
                                                        "Labor Relations Specialist",
                                                        "Training and Development Managers"),
                            "IT & Software" => array("Frontend Developer",
                                                    "Backend Developer",
                                                    "Fullstack Programmer",
                                                    "C#/.NET Developer",
                                                    "Software Engineer",
                                                    "Network Analyst",
                                                    "Systems Support Analyst"),
                            "Legal Services" => array("Property Lawyer",
                                                        "Legal Counsel",
                                                        "Solicitor",
                                                        "Arbitrator",
                                                        "Litigator",
                                                        "Legal Advisor",
                                                        "Paralegal",
                                                        "Mediator",
                                                        "Legal Secretary"),
                            "Management & Business" => array("Actuarial analyst",
                                                            "Business adviser",
                                                            "Business analyst",
                                                            "Business development manager",
                                                            "Chartered management accountant",
                                                            "Corporate investment banker",
                                                            "Data analyst",
                                                            "Data scientist"),
                            "Development" => array("Associate, Growth & Innovation",
                                                    "Logistics & Procurement Officer",
                                                    "Grant and Compliance Officer",
                                                    "Humanitarian Officer",
                                                    "Program Officer"
                ),
                "Marketing & Communications" => array("PRO",
                                                    "Reporter",
                                                    "Journalist",
                                                    "Markerter",
                                                    "Sales Executive",
                                                    "Social Media Manager",
                                                    "Communications Coordinator",
                                                    "Writer"),
            "Medical & Pharmaceutical" => array("Medical Doctor",
                                                "Pharmacist", 
                                                "Nurse",
                                                "Medical Officer",
                                                "Surgeon",
                                                "Psychiatrist",
                                                "Radiologist",
                                                "Optician",
                                                "Cardiologist",
                                                "Pediatrician"),
                "Natural Sciences" => array("Agricultural and Food Scientists",
                                            "Architectural and Engineering Managers",
                                            "Biochemists and Biophysicists",
                                            "Chemists and Materials Scientists",
                                            "Environmental Scientists and Specialists",
                                            "Geoscientists",
                                            "Medical Scientists",
                                            "Physicists and Astronomers"),
                "Project & Product Management" => array("Construction Project Manager",
                                                            "Operations Manager",
                                                            "Project Coordinator",
                                                            "Construction Manager",
                                                            "Functional Manager"),
                "Quality Control & Assurance" => array("Quality Assurance Manager",
                                                        "Quality Assurance Officer",
                                                        "Control Manager",
                                                        "Assurance Specialist",
                                                        "Supervisor",
                                                        "Quality Controller"),
                "Real Estate & Property Management"=>array("Real Estate Manager",
                                                            "Property Manager",
                                                            "Estate Surveyor",
                                                            "Quantity Surveyor",
                                                            "Leasing Agent",
                                                            "Facility Manager",
                                                            "Real Estate Marketer"),
                "Research, Teaching & Training"=>array("Private Tutor",
                                                        "Senior Lecturer",
                                                        "Primary Teacher",
                                                        "Secondary Teacher",
                                                        "Nursery Teacher",
                                                        "Lecturer I",
                                                        "Proprietor",
                                                        "Lecturer II"),
                "Sales" => array("Sales engineer",
                                "Financial services sales agent",
                                "Advertising sales agent",
                                "Insurance sales agent",
                                "Manufacturer's representative",
                                "Medical device sales representative",
                                "Software sales representative",
                                "Marketer"),
                "Security" => array("Security Officer", 
                                    "Information Security Analysts",
                                    "Network Security Administrator",
                                    "Cyber Crime Investigator",
                                    "Network Security Engineers",
                                    "System, Network, and/or Web Penetration Tester",
                                    "Chief Information Security Officer",
                                    "Security Architect",
                                    "Security Manager"),
            "Supply Chain & Procurement" => array("Supply Chain Manager",
                                                    "Logistics Officer",
                                                    "Procurement Officer",
                                                    "Sourcing Manager",
                                                    "Purchasing Manager",
                                                    "Terminal Manager"),
            "Trades & Services" => array("Trade Services Officer",
                                        "Services Officer",
                                        "Sales Supervisor",
                                        "Trading Manager",
                                        "Sales Officer"),
            "Transport & Logistics" => array("Pilot",
                                            "Driver", 
                                            "Logistics Officer",
                                            "Dispatch Rider",
                                            "Delivery Driver",
                                            "Warehouse Manager",
                                            "Procurement Officer"
            )
            );

    public static function gender(){
        $randGender = array_rand($this->genderProp);
        return $this->genderProp[$randGender];
    }
    public static function mobile_number(){
        $randMobile = array_rand($this->phonenumberProp);
        return $this->phonenumberProp[$randGender];
    }
    public static function highest_qualification(){
        $randQual = array_rand($this->$highestQualProp);
        return $this->$highestQualProp[$randQual];
    }
    public static function experience(){
        $randQual = array_rand($this->$highestQualProp);
        return $this->$highestQualProp[$randQual];
    }
    public static function job_vary(){
        $randSectorIndex = array_rand($this->job_sectorProp);
        $randSectorElement = $this->job_sectorProp[$randSector];
        $varietyArrayElement = $this->job_varieties[$randSectorElement];
        $arrayElementIndex = array_rand($varietyArrayElement);
        $arrayElementElement = $varietyArrayElement[$arrayElementIndex];
        $arrayElementArray = array($varietyArrayElement[array_rand($varietyArrayElement)], $varietyArrayElement[array_rand($varietyArrayElement)], $varietyArrayElement[array_rand($varietyArrayElement)]);
        //$variety_element_array = $this->job_varieties[$this->job_titleProp[$randSector]];
        //$randTitle = array_rand($variety_element_array);
        $this->job_array = array();
        $this->job_array[] = $randSectorElement;
        $this->job_array[] = $arrayElementElement;

        $this->job_array[] = $arrayElementArray;
        return $this->job_array;
        //return $this->job_titleProp[$randTitle];
    }
    public static function get_job_array(){
        return $this->job_array;
    }
}