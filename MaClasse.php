<?php
function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$perso = new Personnage;

//$perso1 = new Personnage(60, 0); // 60 de force, 0 de dégât
//$perso2 = new Personnage(100, 10); // 100 de force, 10 dégât