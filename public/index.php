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
    <body class="container">
        <h1>Human Diversity</h1>
        <hr/>
        <br/><br/>

<?php if (!isset($_GET['count'])) : ?>
        <form method="GET">
            <h3>How many humans</h3>
            <p>For how many humans are you looking for?</p>
            <input class="form-control form-control-lg" type="number" id="count" name="count" min="2" max="18" required />
            <button class="btn btn-lg btn-primary mt-3" type="submit">Search</button>
        </form>
<?php else :

echo 
    "<p>The characters listed are not actual members and purely fictional, but you might meet people alike.</p>
    <p>Listen to your stereo, don't put them in the microwave!</p><br/>";

require_once '../config.php';

if ($_GET['count'] < 2)
    $_GET['count'] = 2;

if ($_GET['count'] > 18)
    $_GET['count'] = 18;

// create humans
$humans = [];
for ($i = 0; $i < $_GET['count']; $i++) {
    $humans[] = new Human();
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
            <tr><td class="property">Birthday</td><td colspan="2">'.$human1->getBirthday().' ('.$human1->getZodiac().')</td></tr>
            <tr><td class="property">Age</td><td colspan="2">'.$human1->getAgeInYears().' years</td></tr>
            <tr><td class="property">Size</td><td colspan="2">'.($human1->getSizeInCentimeters() / 100).' meters</td></tr>
            <tr><td class="property">Weight</td><td colspan="2">'.$human1->getWeightInKilograms().' kilograms</td></tr>
            <tr><td class="property">Skills</td><td colspan="2">'.implode(', ', $human1->getSkills()).'</td></tr>
            <tr><td class="property">Soft-Skills</td><td colspan="2">'.implode(', ', $human1->getSoftSkills()).'</td></tr>
            <tr><td class="property">Body-Mass-Index</td><td colspan="2">'.$human1->getBodyMassIndex().'</td></tr>
            <tr><td class="property">Eye-Color</td><td class="color" style="background-color:'.$human1->getEyeColor().';"></td><td>'.$human1->getEyeColor().'</td></tr>
            <tr><td class="property">Hair-Color</td><td class="color" style="background-color:'.$human1->getHairColor().';"></td><td>'.$human1->getHairColor().'</td></tr>
            <tr><td class="property">Skin-Color</td><td class="color" style="background-color:'.$human1->getSkinColor().';"></td><td>'.$human1->getSkinColor().'</td></tr>
        </table>
        <br/>
        '.$human1->getFullBodyImage().'<br/><br/>';
}

echo '<a class="btn btn-lg btn-primary mt-5" href="/">Go for recreation!</a>';

endif ?>

    <br/><br/><br/><br/>
    <hr/>
    <p>This page exists mainly for humorous, recreational and inspirational purpose!</p>
    <p><a href="https://www.xsite.ch">XSite Web Development & Design</a></p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js" integrity="sha512-trzlduO3EdG7Q0xK4+A+rPbcolVt37ftugUSOvrHhLR5Yw5rsfWXcpB3CPuEBcRBCHpc+j18xtQ6YrtVPKCdsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
