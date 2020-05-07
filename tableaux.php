<?php

$tab = array(1,2,3);
$tab = [4,5,6];
$tab[] = 9;
echo 'la taille de mon tableau est : '.count($tab). '<br>';

for ($i = 0; $i < count($tab); $i++) {
    echo $tab[$i].'<br>';
}

foreach ($tab as $nombre) {
    echo $nombre.'<br>';
}