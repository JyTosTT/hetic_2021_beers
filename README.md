## TP

| Groupe 33         |
| ----------------- |
| Jean TOSTIVINT    |
| Christina STEPHAN |
| Guillaume TRAUB   |
| Emma CASSAGNETTES |

[Enoncé de l'exercice](https://github.com/Antoine07/hetic_symfony/blob/main/Introduction/tp_02_days.md)

### Installation

- Créer un fichier .env.local, dans celui-ci :

  - Remplissez DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

- Exécuter les commandes suivantes pour l'installation des bundles et charger les entités.

  - `composer install`

  - `php bin/console doctrine:migrations:migrate`

  - `php bin/console doctrine:fixtures:load`

- Lancer pour le front et la compilation :

  - `npm install`
  - `npm run dev-server`
  - `symfony server:start`

### Lancement

- Pour lancer votre projet : symfony server:start

### Schéma (modèle physique de données)

![Diagram](./assets/imgages/db_bar.png)

### Partie 4 du Tp

Voici un code Doctrine à écrire dans le Repository CategoryRepository, qu'en pensez vous ? Décrivez son utilité dans l'application si on devait le mettre en place.

```php
public function findCatSpecial(int $id)
    {
        return $this->createQueryBuilder('c')
            ->join('c.beers', 'b') // raisonner en terme de relation
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->andWhere('c.term = :term')
            ->setParameter('term', 'special')
            ->getQuery()
            ->getResult();
    }
```

Cette fonction du repository Category permet de sélectionner pour une bière précise ses catégories spéciales et permet donc d'éviter de retourner ses catégories normales.

Nous l'utilisons d'ailleurs dans ce projet pour l'affichage des couleurs selon la catégories pour une bière !
