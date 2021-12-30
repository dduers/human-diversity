<?php

declare(strict_types=1);

use Dduers\HumanDiversity\Human;
use Dduers\HumanDiversity\Model\Color;
use Dduers\HumanDiversity\Model\Gender;
use Dduers\HumanDiversity\Model\Name;
use Dduers\HumanDiversity\Model\Skill;
use Dduers\HumanDiversity\Model\SoftSkill;

if (file_exists('../config/config.local.php'))
    require_once '../config/config.local.php';
else require_once '../config/config.php';

$colors = new Color($_DBC);
$colors = $colors->selectFetchAll([], ['name']);
$genders = new Gender($_DBC);
$genders = $genders->selectFetchAll([], ['name']);
$skills = new Skill($_DBC);
$skills = $skills->selectFetchAll([], ['name']);
$softskills = new SoftSkill($_DBC);
$softskills = $softskills->selectFetchAll([], ['name']);
$names = new Name($_DBC);
$names_female = $names->getFemaleNames([], ['name']);
$names_male = $names->getMaleNames([], ['name']);

$humans = [];
for ($i = 0; $i < ($_GET['count'] ?? 0); $i++) {

    $color = [
        $colors[array_rand($colors)]['name'],
        $colors[array_rand($colors)]['name'],
        $colors[array_rand($colors)]['name']
    ];
    $skill = [
        $skills[array_rand($skills)]['name'],
        $skills[array_rand($skills)]['name'],
        $skills[array_rand($skills)]['name']
    ];
    $softsill = [
        $softskills[array_rand($softskills)]['name'],
        $softskills[array_rand($softskills)]['name'],
        $softskills[array_rand($softskills)]['name']
    ];
    $gender = $genders[array_rand($genders)]['name'];
    $name = $gender === 'female' ? $name = $names_female[array_rand($names_female)]['name'] : $name = $names_male[array_rand($names_male)]['name'];

    $human = new Human(
        $name,
        $gender,
        '2000-01-01',
        170,
        75,
        $skill,
        $softsill,
        $color[0],
        $color[1],
        $color[2],
    );
    $humans[] = $human;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Human Diversity</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Look for humans with different skills, attitudes and properties :) - This page exists mainly for humorous, recreational and inspirational purpose!" />
    <meta name="keywords" content="human, diversity, skills, skill, soft, softskill, softskills, humour">
    <meta name="author" content="Daniel Duersteler">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body class="container mt-5 mb-5">
    <h1>Human Diversity</h1>
    <p>Search for humans with different skills, looks and abilities</p>
    <hr />
    <br /><br />
    <?php if (!isset($_GET['count'])) : ?>
        <form method="GET">
            <h3>How many humans</h3>
            <p>For how many humans are you looking for?</p>
            <input class="form-control form-control-lg" type="number" id="count" name="count" min="2" max="18" required />
            <button class="btn btn-lg btn-primary mt-3" type="submit">Search</button>
        </form>
    <?php else : ?>
        <p>The characters listed are not actual people and purely fictional, but you might meet human beeings alike.</p>
        <p>Listen to your stereo, don\'t put them in the microwave!</p>
        <p class="mb-5">Hint: The full body pictures are just scratching the surface and are rather schematic.</p>
    <?php
        foreach ($humans as $human1)
            echo
            '<h3>' . $human1->getName() . '</h3>
            <table class="table table-bordered mb-5">
                <tr class="' . ($human1->getGender() === 'female' ? 'female' : 'male') . '"><td><b>Name</b></td><td colspan="2">' . $human1->getName() . '</td></tr>
                <tr><td class="property">Avatar</td><td colspan="2">' . $human1->getAvatarImage() . '</td></tr>
                <tr><td class="property">Gender</td><td colspan="2">' . $human1->getGender() . '</td></tr>
                <tr><td class="property">Birthday</td><td colspan="2">' . $human1->getBirthday() . ' (' . $human1->getZodiac() . ')</td></tr>
                <tr><td class="property">Age</td><td colspan="2">' . $human1->getAgeYears() . ' years</td></tr>
                <tr><td class="property">Size</td><td colspan="2">' . ($human1->getSizeCentimeters() / 100) . ' meters</td></tr>
                <tr><td class="property">Weight</td><td colspan="2">' . $human1->getWeightKilograms() . ' kilograms</td></tr>
                <tr><td class="property">Skills</td><td colspan="2">' . implode(', ', $human1->getSkills()) . '</td></tr>
                <tr><td class="property">Soft-Skills</td><td colspan="2">' . implode(', ', $human1->getSoftSkills()) . '</td></tr>
                <tr><td class="property">Body-Mass-Index</td><td colspan="2">' . $human1->getBodyMassIndex() . '</td></tr>
                <tr><td class="property">Eye-Color</td><td class="color" style="background-color:' . $human1->getEyeColor() . ';"></td><td>' . $human1->getEyeColor() . '</td></tr>
                <tr><td class="property">Hair-Color</td><td class="color" style="background-color:' . $human1->getHairColor() . ';"></td><td>' . $human1->getHairColor() . '</td></tr>
                <tr><td class="property">Skin-Color</td><td class="color" style="background-color:' . $human1->getSkinColor() . ';"></td><td>' . $human1->getSkinColor() . '</td></tr>
                <tr><td class="property">Picture</td><td colspan="2">' . $human1->getFullBodyImage() . '</td></tr>
            </table>';
        echo '<a class="btn btn-lg btn-primary mt-5" href="/">Wanna recreation!</a>';
    endif ?>
    <br /><br /><br /><br />
    <hr />
    <p>This page exists mainly for humorous, recreational and inspirational purpose!</p>
    <p><a href="https://www.xsite.ch">XSite Web Development & Design</a></p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js" integrity="sha512-trzlduO3EdG7Q0xK4+A+rPbcolVt37ftugUSOvrHhLR5Yw5rsfWXcpB3CPuEBcRBCHpc+j18xtQ6YrtVPKCdsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>