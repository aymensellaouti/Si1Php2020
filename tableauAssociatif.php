<?php

function showTab($tab) {
    foreach ($tab as $cle  =>$valeur) {
        echo $cle. ' : '. $valeur. '<br>';
    }
}

$tabAssoc = array(
    'name' => 'aymen',
    'firstname' => 'sellaouti',
    'age' => 37,
    'createdAt' => date('l d y')
);

showTab($tabAssoc);