### Installation

- Créer un fichier .env.local, dans celui-ci :

    - Remplissez DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

- Exécuter les commandes suivantes pour l'installation des bundles et charger les entités.

    - ```composer install```

    - ```php bin/console make:migration```

    - ```php bin/console doctrine:migrations:migrate```

    - ```php bin/console doctrine:fixtures:load```


### Lancer 

- Pour lancer votre projet : symfony server:start