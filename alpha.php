<?php

$lettre["a"]    ="________"
                ."_******_"
                ."_*____*_"
                ."_*____*_"
                ."_******_"
                ."_*____*_"
                ."_*____*_"
                ."________"; 

$lettre["m"]    ="________"
                ."_*____*_"
                ."_**__**_"
                ."_*_**_*_"
                ."_*____*_" 
                ."_*____*_"
                ."_*____*_"
                ."________"; 

$lettre["n"]    ="________"
                ."_*____*_"
                ."_**___*_"
                ."_*_*__*_"
                ."_*__*_*_" 
                ."_*___**_"
                ."_*____*_"
                ."________"; 
 
$lettre["d"]    ="________"
                ."_*****__"
                ."_*____*_"
                ."_*____*_"
                ."_*____*_" 
                ."_*____*_"
                ."_*****__"
                ."________";

$lettre[" "]    ="________"
                ."________"
                ."________"
                ."________"
                ."________" 
                ."________"
                ."________"
                ."________"; 
 
$mot = " amanda ";

//====================== COULEURS ============================

function color($c)
{
    switch($c)
    {
        case 0      : $d = "\033[30m"; break;
        case 1      : $d = "\033[31m"; break;
        case 2      : $d = "\033[32m"; break;
        case 3      : $d = "\033[33m"; break;
        case 4      : $d = "\033[34m"; break;
        case 5      : $d = "\033[35m"; break;
        case 6      : $d = "\033[36m"; break;
        case 7      : $d = "\033[37m"; break;

        case 'noir'     : $d = "\033[30m"; break;
        case 'rouge'    : $d = "\033[31m"; break;
        case 'vert'     : $d = "\033[32m"; break;
        case 'jaune'    : $d = "\033[33m"; break;
        case 'bleu'     : $d = "\033[34m"; break;
        case 'magenta'  : $d = "\033[35m"; break;
        case 'cyan'     : $d = "\033[36m"; break;
        case 'blanc'    : $d = "\033[37m"; break;
    }
    print($d);
}


//====================== POSITIONNEMENT ============================

function locateXY($x,$y)
{
    print("\033[".$y.";".$x."H");  
}

//====================== PREPARATION DE L'AFFICHAGE ============================

for($l = 0 ; $l<8 ; $l++)
{
    $lignes[$l] = '';

    for($i = 0 ; $i<strlen($mot); $i++)
    {
        $caractere = $mot[$i];
        $lignes[$l] .= substr($lettre[$caractere],$l*8,8);
    }

    $lignes[$l] = str_replace("_",' ',$lignes[$l])."\n";
}

//====================== AFFICHAGE ET MOUVEMENT ============================

$x = 2;     
$s = 1 ; //le pas

while(1==1)
{
    for($l= 0;$l<8;$l++)
    {
        locateXY($x,2+$l);
        color($l);
        print($lignes[$l]); 
    }
    //=========== CALCUL DU MOUVEMENT AVEC PAS =================
    $x = $x + $s;

    if($x ==10) $s =-1;

    if($x == 4) $s = 1;

    usleep(200000);
}

?>


<!-- Changement de la couleur en utilisant la boucle d'incrémentation déjà existante.
    

for($l = 0 ; $l<8 ; $l++)
{
    $lignes[$l] = "\033[3".$l."m";

    for($i = 0 ; $i<strlen($mot); $i++)
    {
        $caractere = $mot[$i];

        $lignes[$l] .= substr($lettre[$caractere],$l*8,8);
    }
}
 -->
