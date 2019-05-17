<!-- page pour tester l'affichage -->
<?php
    $cathegories=$_POST["cathegories"];
    $cathegories = $cathegories->fetchAll();
    foreach ($cathegories as $row) {
        echo "<pre>";
        print_r($row["id_cathegorie"]);
        echo "</pre>";
    }
    foreach ($cathegories as $row) {
        echo "<pre>";
        print_r($row["id_cathegorie"]);
        echo "</pre>";
    }
?>