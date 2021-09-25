<!DOCTYPE html>
<html>
    <head>
        <title>Human Diversity</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Look for humans with different skills, attitudes and properties :)" />
        <meta name="keywords" content="human, diversity, skills, skill, soft, softskill, softskills, humour">
        <meta name="author" content="Daniel Duersteler">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>

<?php if (!isset($_GET['count'])) : ?>
        <form method="GET">
            <label for="count">How many humans</label>
            <p>For how many humans are you looking for?</p>
            <input type="number" id="count" name="count" min="2" max="18" required />
            <button type="submit">Search</button>
        </form>
<?php else :

require_once '../config.php';

if ($_GET['count'] < 2)
    $_GET['count'] = 2;

if ($_GET['count'] > 18)
    $_GET['count'] = 18;

// create humans
$humans = [];
for ($i = 0; $i < $_GET['count']; $i++) {
    if (rand(0, 1) === 1) {
        $name = $femaleNames[rand(0, count($femaleNames) - 1)];
        $humans[] = new Woman($name);
    } else {
        $name = $maleNames[rand(0, count($maleNames) - 1)];
        $humans[] = new Man($name);
    }
}

// output human properties
$i = 0;
foreach ($humans as $human1) {
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

echo '<a href="/">Go for recreation!</a>';

endif ?>

    <br/>
    <br/>
    <br/>
    <br/>
    <hr/>
    <p>This page exists mainly for humorous, recreational and inspirational purpose!</p>
    <p><a href="https://www.xsite.ch">XSite Web Development & Design</a></p>
    </body>
</html>
