<?php
// Inclusion du fichier 'entete.php'
require_once __DIR__ . '/../includes/entete.php';
?>
<div class="rowSlim"></div>
<?php
// Importation de la classe 'classParent' de l'espace de noms 'tests'
use parentClass\classParent;

// Déclaration de la classe 'classEnfant' qui étend 'classParent'
class classEnfant extends classParent {

    // Déclaration d'une méthode 'calculateArea'
    function calculateArea($side) {
        // Appel de la méthode statique 'square' de la classe parente
        return classParent::square($side);
    }

    // Déclaration d'une méthode 'display'
    function displayArea(int $value) {
        echo 'aire : ' . $this->calculateArea($value);
        echo '<br>';

        // Appel de la méthode 'increment' de la classe parente
        $this->increment();  // $this->prop vaut maintenant 1

        echo 'increnment : ' . $this->prop;
        echo '<br>';
        $this->increment();  // $this->prop vaut maintenant 2
        echo 'increnment : ' . $this->prop;
    }
}

// Instanciation de la classe 'classEnfant'
$obj = new classEnfant();
// Appel de la méthode 'display'
$obj->displayArea(4);// Affiche : 16
?>


<h1>Les espaces de noms et l'autoloading en PHP</h1>
<details>
    <summary><strong>Autoloading en PHP</strong></summary>
    <p>En PHP, lorsque tu crées des classes dans différents fichiers, tu dois inclure ces fichiers chaque fois que tu
        veux utiliser ces classes. C'est ce que font `require`, `require_once`, `include` et `include_once`. Cependant,
        cela peut devenir fastidieux si tu as beaucoup de classes dans beaucoup de fichiers.</p>
    <p>Pour résoudre ce problème, PHP fournit une fonction appelée `spl_autoload_register`. Cette fonction permet de
        définir tes propres règles pour inclure automatiquement les fichiers de classe lorsque tu essaies d'instancier
        une nouvelle classe.</p>
    <p>Voici comment ça marche :</p>
    <ol>
        <li>Définir une fonction qui prend le nom de la classe comme argument. Cette fonction construit le chemin du
            fichier à partir du nom de la classe et inclut ce fichier.
        </li>
        <li>Passer cette fonction à `spl_autoload_register`. Maintenant, chaque fois que tu essaies d'instancier une
            nouvelle classe, PHP va automatiquement appeler ta fonction avec le nom de la classe. Ta fonction inclut le
            fichier de classe, et tu peux utiliser la classe sans avoir à inclure le fichier manuellement.
        </li>
    </ol>
    <p>Voici un exemple de code :</p>
    <pre><code>
spl_autoload_register(function ($name) {
    require_once __DIR__ . '/../src/' . $name . '.php';
});
        </code></pre>
    <p>Dans cet exemple, la fonction prend le nom de la classe (`$name`), ajoute le chemin du répertoire `src/` avant et
        `.php` après, et inclut le fichier résultant. Donc, si tu essaies d'instancier une classe appelée `MaClasse`, la
        fonction va inclure le fichier `src/MaClasse.php`.</p>
    <p>Si tu utilises des espaces de noms, tu dois également prendre en compte les espaces de noms lors de la
        construction du chemin du fichier. Tu peux utiliser la fonction `str_replace` pour remplacer les backslashes
        (`\`) des espaces de noms par des slashes (`/`) pour construire le chemin du fichier.😊</p>
</details>
<details>
    <summary><strong>Espaces de noms en PHP</strong></summary>
    <p>En PHP, les espaces de noms sont une façon d'encapsuler des éléments de code. Ils sont similaires aux dossiers
        sur ton ordinateur. Par exemple, tu peux avoir plusieurs fichiers nommés `index.php` sur ton ordinateur, tant
        qu'ils sont dans des dossiers différents. De la même manière, tu peux avoir plusieurs classes avec le même nom
        dans ton code PHP, tant qu'elles sont dans des espaces de noms différents.</p>
    <p>Voici comment tu peux définir un espace de noms en PHP :</p>
    <pre><code>
namespace MonEspaceDeNoms;

class MaClasse {
    // ...
}
        </code></pre>
    <p>Dans cet exemple, la classe `MaClasse` est dans l'espace de noms `MonEspaceDeNoms`. Tu peux utiliser cette classe
        en dehors de ce fichier en utilisant son nom complet, qui comprend l'espace de noms :</p>
    <pre><code>
$obj = new MonEspaceDeNoms\MaClasse();
        </code></pre>
    <p>Cependant, écrire le nom complet de la classe à chaque fois peut être fastidieux. C'est là que l'instruction
        `use` entre en jeu. `use` te permet d'importer une classe, une fonction ou une constante d'un autre espace de
        noms afin que tu puisses l'utiliser avec son nom court. Voici comment tu peux le faire :</p>
    <pre><code>
use MonEspaceDeNoms\MaClasse;

$obj = new MaClasse();
        </code></pre>
    <p>Maintenant, parlons de l'autoloading. Lorsque tu utilises des espaces de noms, il est courant de faire
        correspondre la structure de l'espace de noms avec la structure des répertoires. Par exemple, si tu as une
        classe `MaClasse` dans l'espace de noms `MonEspaceDeNoms`, alors le fichier `MaClasse.php` serait généralement
        situé dans le répertoire `MonEspaceDeNoms/`.</p>
    <p>Cela rend l'autoloading très simple. Tu peux simplement remplacer les backslashes (`\`) des espaces de noms par
        des slashes (`/`) pour construire le chemin du fichier. Voici comment tu peux le faire dans ta fonction
        `spl_autoload_register` :</p>
    <pre><code>
spl_autoload_register(function ($name) {
    $name = str_replace('\\', '/', $name);
    require_once __DIR__ . '/../src/' . $name . '.php';
});
        </code></pre>
    <p>Dans cet exemple, si tu essaies d'instancier une classe appelée `MonEspaceDeNoms\MaClasse`, la fonction va
        inclure le fichier `src/MonEspaceDeNoms/MaClasse.php`.😊</p>
</details>
<div class="rowSlim"></div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
