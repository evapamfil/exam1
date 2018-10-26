# Examen

Dev 3 - 26/10/208

## Objectifs

- Afficher les résultats d'une base de données et les "binder" dans une classe "Model".
- Transformer les dates en instances Carbon : https://carbon.nesbot.com.
- 😈 Afficher les propriétés du "Model" sous forme de json encodé dans une chaine de caractères

## Etapes

1. Charger automatiquement les classes via psr-4 avec Composer dans le dossier `App/`.
2. Binder les résultats dans une class User :
    - 😬 Manuellement ou
    - 💁‍ Automatiquement avec PDO
3. Créer les méthodes utiles pour l'affichage (`getFullName()`)
4. Transformer toutes les dates de la classe en instance Carbon (`created_at` et `last_login`).
5. Afficher les résultats en HTML

### 😈 Hard mode (optionnel)

6. Afficher les résultats sous forme de Json.
7. Cacher la propriété `password`.

## Contraintes

- Récupérer les résultats de la base de données via `PDO`.
- La classe `User` doit avoir des "getters" et "setters" pour toutes les propriétés. On ne peut pas accéder aux propriétés de la class User directement.
    ```php
    echo $user->email; // No 🙅‍
    echo $user->getEmail(); // Ok 👍
    ```
- La classe `User` doit pouvoir directement afficher le nom complet de l'utilisateur `getFullName()`.
- La classe `User` doit hériter de la classe `Model`.
- La classe `Model` s'occupe de transformer les dates en objets de type `Carbon` (de façon dynamique ou de façon manuelle) lors de la création de l'objet `User`.
    ```php
    // OK 👍
    $user = new User;
    $user->getCreatedAt()->format('d/m/Y');

    // Meh 🤔
    $user = new User(...);
    $user->getCreatedAt()->format('d/m/Y');
    ```
- La classe `User` doit renvoyer toutes les informations de l'utilisateur sous forme d'objet en cas d'appel sous forme d'objet.
    ```php
    $user = new User;
    print_r($user);
    ```

    ```php
    App\Models\User Object ( [dates:protected] => Array ( [0] => created_at [1] => updated_at ) [hidden:protected] => Array ( [0] => password ) [id] => 1 [first_name] => Clémence [last_name] => Foucher [email] => dasilva.jean@hotmail.fr [created_at] => Carbon\Carbon Object ( [localMonthsOverflow:protected] => [localYearsOverflow:protected] => [localStrictModeEnabled:protected] => [localHumanDiffOptions:protected] => [localToStringFormat:protected] => [localSerializer:protected] => [localMacros:protected] => [localGenericMacros:protected] => [localTranslator:protected] => [dumpLocale:protected] => [date] => 2014-05-17 10:38:56.000000 [timezone_type] => 3 [timezone] => UTC ) [updated_at] => Carbon\Carbon Object ( [localMonthsOverflow:protected] => [localYearsOverflow:protected] => [localStrictModeEnabled:protected] => [localHumanDiffOptions:protected] => [localToStringFormat:protected] => [localSerializer:protected] => [localMacros:protected] => [localGenericMacros:protected] => [localTranslator:protected] => [dumpLocale:protected] => [date] => 2018-07-01 16:41:11.000000 [timezone_type] => 3 [timezone] => UTC ) [password] => 67865209a8f89b09052a657a51a1399b69ca9d9157e50efb290670bb0ae25a13 )
    ```
- 😈 La classe `User` doit renvoyer toutes les informations de l'utilisateur sous forme json en cas d'appel sous forme de chaine de caractères **sans dévoiler le mot de passe**.
    ```php
    $user = new User;
    echo $user;
    ```

    ```json
    {"id":"1","first_name":"Cl\u00e9mence","last_name":"Foucher","email":"dasilva.jean@hotmail.fr","created_at":"2014-05-17T10:38:56.000000Z","updated_at":"2018-07-01T16:41:11.000000Z"}
    ```

## Hierarchie

### Fichiers

```
app/
    Model/
        Model.php
        User.php
public/
    index.php
vendor/
composer.json
composer.lock
```

### Namespaces

```
$user = new \App\Models\User;
$model = new \App\Models\Model;
```

## Résultats attendus

| Date | Full Name | Email | Last login |
|------|-----------|-------|------------|
| 12/12/2012 | Clément Barbaza | clement@example.com | 2 weeks ago |
| 12/12/2012 | Tomy Spagnoletti | tomy@example.com | Never |
