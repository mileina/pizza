<style>
      body {
		margin-top: 10em;
        margin-right: 20em;
		margin-left :20em;
      }
    
    </style>
<?php
// Lire le contenu du fichier menu.csv
$menu_csv = file('menu.csv');

// Parcourir chaque ligne du fichier
foreach ($menu_csv as $line) {
    // Découper la ligne en colonnes (Plat, Description, Prix) en utilisant la virgule comme séparateur
    $columns = str_getcsv($line);

    // Si la ligne contient des données, afficher les informations
    if (!empty($columns[0])) {
        // Afficher le titre de la catégorie en utilisant la balise <h2>
        if (empty($columns[1]) || empty($columns[2])) {
            echo "<h2>{$columns[0]}</h2>";
        } else {
            // Afficher le nom du plat et la description à gauche
            echo "<div style='display: flex; justify-content: space-between;'>";
            echo "<div><strong>{$columns[0]}</strong><br>{$columns[1]}</div>";

            // Afficher le prix à droite
            echo "<div><strong>" . str_replace('.', ',', $columns[2]) . " €</strong></div>";
            echo "</div><br>";
        }
    }
}
?>
