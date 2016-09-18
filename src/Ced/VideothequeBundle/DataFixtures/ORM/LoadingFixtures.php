<?php
# Fichier videotheque/src/Ced/Bundle/VideothequeBundle/DataFixtures/ORM/LoadingFixtures.php
/* Les Fixtures doivent êtres stockées dans le namespace suivant */
namespace  Ced\VideothequeBundle\DataFixtures\ORM;

/*
 *  On a besoin de recourir à l'interface FixtureInterface pour définir une fixture alors on le déclare
 * Si nous n'avions pas mis ce use, on aurait dû taper
 * class LoadingFixtures implements Doctrine\Common\DataFixtures\FixtureInterface pour l'implémentation
 * de l'interface FixtureInterface, ce qui avouons-le n'est pas toujours très pratique, surtout si on
 * veut utiliser plusieurs fois l'objet / interface en question.
 */
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/*
 * Nous aurons besoin de nos entités Genre et Film également, on le déclare donc ici aussi...
 */
use Ced\VideothequeBundle\Entity\Genre;
use Ced\VideothequeBundle\Entity\Film;

/*
 * Les fixtures sont des objets qui doivent obligatoireemnt implémenter l'interface FixtureInterface
 */
class LoadingFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Création d'un Genre Horreur
        $Horreur = new Genre();
        $Horreur->setNomLabel("Horreur");
        // Enregistrment dans la base de données
        $manager->persist($Horreur);
        $manager->flush();

        // Création d'un genre Action
        $Action = new Genre();
        $Action->setNomLabel("Action");
        // Enregistrment dans la base de données
        $manager->persist($Action);
        $manager->flush();

        // Création d'un genre Aventure
        $Aventure = new Genre();
        $Aventure->setNomLabel("Aventure");
        // Enregistrment dans la base de données
        $manager->persist($Aventure);
        $manager->flush();

        // Création d'un genre Science fiction
        $Science_fiction = new Genre();
        $Science_fiction->setNomLabel("Science fiction");
        // Enregistrment dans la base de données
        $manager->persist($Science_fiction);
        $manager->flush();

        // On crée le film Matrix !
        $Film = new Film();
        $Film->setTitre("Matrix");
        $Film->setDescription("Un super film ou neo va se révéler être l'élu. Sa mission sera de sauver l'humanité de la matrix. Mais ... Qu'est ce que la matrice ?");
        $Film->getListeDesGenres()->add($Action);
        $Film->getListeDesGenres()->add($Science_fiction);
        // Enregistrment dans la base de données
        $manager->persist($Film);
        $manager->flush();
    }
}
