<?php

require_once(PATH_MODELS.'AnimalDAO.php');

$anim = new AnimalDAO(null);
$animals = $anim -> getAnimals(0);

require_once(PATH_VIEWS.$page.'.php');

