<?php
// présence du mot-clé class suivi du nom de la classe.
class Personnage 
{
    private $_force; // la force du personnage (plus elle est grande, plus l'attaque est puissante)
    private $_localisation; // sa localisation
    private $_experience; // son experience
    private $_degats; // ses dégâts
    
    public function __construc($force, $degats)
    {
        echo 'Voici le constructeur !'; // message s'affichant une fois que tout objet est crée
        $this->setForce($force); // initialisation de la force
        $this->setDegats($degats); // initialisation des degats
        $this->_experience = 1; // initialisation de l'expérience a 1
    }

    // une méthode qui déplacera le personnage (modifiera sa localisation)
    public function deplacer() 
    {

    }
     // une méthode qui frappera un personnage (suivant la force de notre personnage)
    public function frapper(Personnage $persoAFrapper)
    {
        $persoAFrapper->_degats += $this->_force;
    }

    public function afficherExperience()
    {
        echo $this->_experience;
    }

    public function gagnerExperience() // une méthode augmentant l'attribut $_experience du personnage
    {
        $this->_experience = $this->_experience + 1; // on ajoute 1 a notre attribut $_experience
        // $this->_experience++; ceci est un raccource qui equivaut a la ligne au dessus on aurait aussi pu ecrire $this->experience += 1
    }

    // mutateur charger de modifier l'attribut $_force
    public function setForce($force)
    {
        if (!is_int($force)) // si il ne s'agit pas d'un nombre entier
        {
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        if ($force > 100) // on vérifie bien qu'on ne souhaite pas assigne une valeur supérieur a 100
        {
            trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_wARNING);
            return;
        }

        $this->_force = $force;
    }

    // mutateur chargé de modifier l'attibut $_experience
    public function setExperience($experience)
    {
        if (!is_int($experience)) // si il ne s'agit pas d'un nombre entier
        {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        if ($experience > 100) // on verifie bien qu'on ne souhaite pas assigner une valeur supérieure a 100
        {
            trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }

        $this->_experience = $experience;

    }

    // ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats
    public function degats()
    {
        return $this->_degats;
    }

    // ceci est la methode force() : elle se charge de renvoyer le contenu de l'attribut $_force
    public function force()
    {
        return $this->_force;
    }

    // ceci est la methode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience
    public function experience()
    {
        return $this->_experience;
    }

    // nous déclarons une méthode(fonction) dont le seul but est d'afficher un texte
    public function parler()
    {
        echo 'Je suis un personnage !';
    }

}

$perso1 = new Personnage; // un premier personnage
$perso2 = new Personnage; // un second personnage

$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(58);

$perso1->frapper($perso2); // $perso1 frapper $perso2
$perso1->gagnerExperience(); // $perso1 gagne de l'expérience

$perso2->frapper($perso1); // $perso2 frappe $perso1
$perso2->gagnerExperience(); // $perso2 gagne de l'expérience

// on affiche la force des deux personnage
echo 'Le personnage 1 a ', $perso1->force(), ' de force, alor que le personnage 2 a ', $perso2->force(), ' de force.<br />';
// on affiche l'exprience des deux personnage
echo 'Le personnage 1 a ', $perso1->experience(), ' d\'expérience, contrairement au personnage 2 qui a ', $perso2->experience(), ' d\'expérience.<br />';
// on affiche les dégâts des deux personnage
echo 'Le personnage 1 a ', $perso1->degats(), ' de dégâts, alor que le personnage 2 a ', $perso2->degats(), ' de dégâts.<br />';



// $perso->afficherExperience(); // on affiche la nouvelle valeur de l'attribut
//$perso->parler();

?>