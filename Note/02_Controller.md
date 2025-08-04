# Controlleur

Lorsqu'une requête arrive sur le serveur, Symfony essaie de faire match une route qui correspond au path de la requête.

Une route est le lien entre le chemin de la requête et un callable PHP, une fonction devant créer la réponse HTTP associé à la requête.

Les callable sont appelés des controllers. Dans Symfony, ils sont implémenté sous la forme d'une classe.

Il est possible de le faire manuellement, ou bien d'utiliser la CLI.

## Maker Bundle

Le paquet `symfony/maker-bundle` qui à été installé en tant que composant du paquet `webapp`.

La commande `list` permet d'afficher toutes les commandes disponible.

```shell
symfony console list make
```

## Créer un nouveau controller

Pour créer un nouveau controller, on utilise la commande

```shell
symfony console make:controller <ControllerName>
```

La commande vient créer un nouveau fichier dans `src/Controller/` contenant le code de la classe directement utilisable.

```php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConferenceController extends AbstractController
{
    #[Route('/conference', name: 'app_conference')]
    public function index(): Response
    {
        return $this->render('conference/index.html.twig', [
            'controller_name' => 'ConferenceController',
        ]);
    }
}
```

L'attribut `#[Route('/conference', name: 'app_conference')]` est ce qui fait de la méthode `index()` un controlleur.

Lorsque l'on se rend sur `/conference` avec le navigateur, la requête match avec ce controleur, et il viens dirigier celle ci. Il s'occupe également de retourner la réponse attendue.

Pour définir la route qui doit match avec le controlleur, on viens le définir dans l'attribut placer au dessus de la méthode.

## Retourner directement une réponse HTML du controller

```php
 // on définit le chemin qui mathc avec ce controlleur
    // le premier argument est le path utiliser
    // le second est le nom de la route qui permet d'y faire référence pour créer des liens.
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return new Response('<html>
            <body>
                <img src="/images/under-construction.gif" />
            </body>
        </html>');
    }
```

La responsabilité principale du controlleut est de retourner la réponse HTTP.

# Request

L'objet `Request` est utiliser pour récupérer des données issue de la request

```php
// import de la classe Request
use Symfony\Component\HttpFoundation\Request;

// on injecte dans la méthode l'objet Request
public function index(Request $request): Response
     {
+        $greet = '';
// on utilise request pour récupérer la valeur de la query string
+        if ($name = $request->query->get('hello')) {
+            $greet = sprintf('<h1>Hello %s!</h1>', htmlspecialchars($name));
+        }
```

On peut également directement utiliser le nom pour l'utiliser dans le code :

## Paramètre dynamique

```php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    // on définit le chemin qui mathc avec ce controlleur
    // le premier argument est le path utiliser
    // le second est le nom de la route qui permet d'y faire référence pour créer des liens.
    #[Route('/hello/{name}', name: 'homepage')]
    public function index(string $name = ''): Response
    {
        $greet = '';
        // $name est automatiquement récupérer depuis l'url
        if($name){
            $greet = sprintf('<h1>Hello %s!</h1>', htmlspecialchars($name));
        }

        return new Response('<html>
            <body>
                $greet
                <img src="/images/under-construction.gif" />
            </body>
        </html>');
    }
}
```

La partie de la route `{name}` est un paramètre de route dynamique. Il fonctionne comme un joker. On peut se rendre sur `/hello` ou `/hello/clement` dans un navigateur pour obtenir la page.

On peut récupérer la valeur du paramètre en ajoutant un argument portant le même nom au controlleur -> `$name`

# Debug

La fonction `dump()` permet de voir le contenu des variables.

```php
dump($request);
```
