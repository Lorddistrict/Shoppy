## Instructions for running the program :

1. Rename the ".env.exemple" on ".env"
2. Fill the .env with your database informations
3. Use composer to get this library : composer require catfan/Medoo 
4. Use composer to get this library : composer require vlucas/phpdotenv
5. Get the database.sql file and upload it on your machine

Désolé de ne pas avoir eu le temps de mieux développer la partie protection.

Actuellement elle empêche un autre utilisateur de rentrer dans l'édition du produit
si un utilisateur y est déjà. De ce fait, il ne peut pas y avoir deux individus qui y
accèdent.

Il aurait pu être intéressant de ne pas passer par la base de données mais je n'ai pas
trouvé de solution efficace autrement.

J'espère ne rien avoir oublié de vos recommandations, dans le cas contraire je m'en excuse.

Enfin, il est vrai qu'il y a un soucis qui fait que si l'utilisateur ferme la page en cours d'édition, celle-ci ne changera pas la valeur de isEdited par false et restera bloquée. Je n'ai réalisé qu'une ébauche de la situation mais n'est pas fonctionnelle.