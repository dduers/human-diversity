<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Controller;

use Dduers\HumanDiversity\AppController;
use Dduers\HumanDiversity\Human;
use Dduers\HumanDiversity\Model\Color;
use Dduers\HumanDiversity\Model\Gender;
use Dduers\HumanDiversity\Model\Name;
use Dduers\HumanDiversity\Model\Skill;
use Dduers\HumanDiversity\Model\SoftSkill;
use Dduers\HumanDiversity\Utility\General;

final class home extends AppController
{
    function get()
    {
        $_model_color = new Color();
        $_colors = $_model_color->getRecords();

        $_model_gender = new Gender();
        $_genders = $_model_gender->getRecords();

        $_model_skill = new Skill();
        $_skills = $_model_skill->getRecords();

        $_model_softskill = new SoftSkill();
        $_softskills = $_model_softskill->getRecords();

        $_model_name = new Name();
        $_names_female = $_model_name->getFemaleNames();
        $_names_male = $_model_name->getMaleNames();

        $_humans = [];
        //for ($i = 0; $i < ($_GET['count'] ?? 0); $i++) {

        $_color = [
            $_colors[array_rand($_colors)]['name'],
            $_colors[array_rand($_colors)]['name'],
            $_colors[array_rand($_colors)]['name']
        ];

        $_gender = $_genders[array_rand($_genders)]['name'];
        $_name = $_gender === 'female' ? $_name = $_names_female[array_rand($_names_female)]['name'] : $name = $_names_male[array_rand($_names_male)]['name'];

        $_size = General::createRandomNumber(80, 210);
        $_weight = General::createRandomNumber(5, 280);

        $_birthdate = General::createRandomDate();

        $_human = new Human(
            $_name,
            $_gender,
            $_birthdate,
            $_size,
            $_weight,
            NULL, // skills
            NULL, //softskills
            $_color[0],
            $_color[1],
            $_color[2],
        );

        for ($j = 0; $j < rand(2, 5); $j++)
            $_human->addSkill($_skills[array_rand($_skills)]['name']);

        for ($j = 0; $j < rand(2, 5); $j++)
            $_human->addSoftSkill($_softskills[array_rand($_softskills)]['name']);

        $_humans[] = $_human;
        //}

        self::vars('VIEWVARS.humans', $_humans);
    }
}
