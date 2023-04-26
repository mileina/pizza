<style>
      body {
		margin-top: 10em;
        margin-right: 20em;
		margin-left :20em;
      }
    
    </style>

<?php
// Lire le contenu du fichier menu.tsv
$menu_tsv = file_get_contents('menu.tsv');

// Découper le fichier en lignes en utilisant les sauts de ligne comme séparateurs
$lines = explode("\n", $menu_tsv);

// Parcourir chaque ligne du fichier
foreach ($lines as $line) {
    // Si la ligne contient un double-point, il s'agit d'un plat
    if (strpos($line, ' : ') !== false) {
        // Découper la ligne en nom de plat et description
        list($plat, $description) = explode(' : ', $line);

        // Vérifier si la description contient un séparateur '-' avant de la diviser en ingrédients et prix
        if (strpos($description, ' - ') !== false) {
            list($ingredients, $prix) = explode(' - ', $description);
        } else {
            $ingredients = $description;
            $prix = '';
        }

        // Afficher le nom du plat et les ingrédients à gauche
        echo "<div style='display: flex; justify-content: space-between;'>";
        echo "<div><strong>{$plat}</strong><br>{$ingredients}</div>";

        // Afficher le prix à droite
        echo "<div><strong>{$prix}</strong></div>";
        echo "</div><br>";
    } else {
        // Si la ligne ne contient pas de double-point, il s'agit d'un titre
        echo "<h2>{$line}</h2>";
    }
}
?>
