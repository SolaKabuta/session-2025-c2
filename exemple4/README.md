# Exemple de connexion

## DB MariaDB

Importer le fichier `datas/exe4session.sql` dans votre base de données MariaDB.

    exe4session

Une table : user

## Utilisation de mysqli procédurale

Dans cet exemple, nous allons utiliser la méthode procédurale de mysqli pour interagir avec la base de données. Cette méthode est simple et efficace pour les petites applications.

Nous la modifierons plus tard pour utiliser la méthode orientée objet PDO.


```php
    $conn = mysqli_connect("localhost", "root", "", "exe4session");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
```
    

### users

2 utilisateurs :

    username : Mike
    email : michael@cf2m.be
    password : 27db27
    uniqid : cf63f8a0c05c1250.08872603

    username : Andre
    email : andre@cf2m.be
    password : 28db29
    uniqid : cf63f8a14f5f4767.06543540

Nous avons utilisé password_hash() pour crypter le mot de passe : 

https://www.php.net/manual/en/function.password-hash.php

