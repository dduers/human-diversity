<!DOCTYPE html>
<html>
    <head>
        <title>Human Diversity</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>

<?php if (!isset($_GET['count'])) : ?>

    <form method="GET">
        <label for="count">How many humans?</label>
        <input type="number" id="count" name="count" min="2" max="69" required />
        <button type="submit">Generate</button>
    </form>

<?php else :

require_once '../config.php';

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

    </body>
</html>
