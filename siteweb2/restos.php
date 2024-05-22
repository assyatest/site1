<?php

require_once "include/actions.php";

// Si le formulaire d'ajout de plat est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter_plat"])) {
    // Récupérer les données du formulaire
    $nom_plat = $_POST["nom_plat"];
    $commentaire_plat = $_POST["commentaire_plat"];
    $prix_plat = $_POST["prix_plat"];
    $id_resto = $_POST["id_resto"];

    // Appeler la fonction pour ajouter un plat
    insert_plat($nom_plat, $commentaire_plat, $prix_plat, $id_resto);
}

// Si le formulaire de mise à jour de plat est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier_plat"])) {
    // Récupérer les données du formulaire
    $plat_id = $_POST["plat_id"];
    $nouveau_nom_plat = $_POST["nouveau_nom_plat"];
    $nouveau_commentaire_plat = $_POST["nouveau_commentaire_plat"];
    $nouveau_prix_plat = $_POST["nouveau_prix_plat"];

    // Appeler la fonction pour mettre à jour le plat
    update_plat($plat_id, $nouveau_nom_plat, $nouveau_commentaire_plat, $nouveau_prix_plat);
}

// Si le formulaire de suppression de plat est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer_plat"])) {
    // Récupérer l'ID du plat à supprimer
    $plat_id = $_POST["plat_id"];

    // Appeler la fonction pour supprimer le plat
    delete_plat($plat_id);
}

// Si le formulaire d'ajout d'entrée est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter_entree"])) {
    // Récupérer les données du formulaire
    $nom_entree = $_POST["nom_entree"];
    $commentaire_entree = $_POST["commentaire_entree"];
    $prix_entree = $_POST["prix_entree"];
    $id_resto = $_POST["id_resto"];

    // Appeler la fonction pour ajouter une entrée
    insert_entree($nom_entree, $commentaire_entree, $prix_entree, $id_resto);
}

// Si le formulaire de mise à jour d'entrée est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier_entree"])) {
    // Récupérer les données du formulaire
    $entree_id = $_POST["entree_id"];
    $nouveau_nom_entree = $_POST["nouveau_nom_entree"];
    $nouveau_commentaire_entree = $_POST["nouveau_commentaire_entree"];
    $nouveau_prix_entree = $_POST["nouveau_prix_entree"];

    // Appeler la fonction pour mettre à jour l'entrée
    update_entree($entree_id, $nouveau_nom_entree, $nouveau_commentaire_entree, $nouveau_prix_entree);
}

// Si le formulaire de suppression d'entrée est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer_entree"])) {
    // Récupérer l'ID de l'entrée à supprimer
    $entree_id = $_POST["entree_id"];

    // Appeler la fonction pour supprimer l'entrée
    delete_entree($entree_id);
}

// Si le formulaire d'ajout de dessert est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter_dessert"])) {
    // Récupérer les données du formulaire
    $nom_dessert = $_POST["nom_dessert"];
    $commentaire_dessert = $_POST["commentaire_dessert"];
    $prix_dessert = $_POST["prix_dessert"];
    $id_resto = $_POST["id_resto"];

    // Appeler la fonction pour ajouter un dessert
    insert_dessert($nom_dessert, $commentaire_dessert, $prix_dessert, $id_resto);
}

// Si le formulaire de mise à jour de dessert est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifier_dessert"])) {
    // Récupérer les données du formulaire
    $dessert_id = $_POST["dessert_id"];
    $nouveau_nom_dessert = $_POST["nouveau_nom_dessert"];
    $nouveau_commentaire_dessert = $_POST["nouveau_commentaire_dessert"];
    $nouveau_prix_dessert = $_POST["nouveau_prix_dessert"];

    // Appeler la fonction pour mettre à jour le dessert
    update_dessert($dessert_id, $nouveau_nom_dessert, $nouveau_commentaire_dessert, $nouveau_prix_dessert);
}

// Si le formulaire de suppression de dessert est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer_dessert"])) {
    // Récupérer l'ID du dessert à supprimer
    $dessert_id = $_POST["dessert_id"];

    // Appeler la fonction pour supprimer le dessert
    delete_dessert($dessert_id);
}

// Récupérer la liste des restaurants
$restaurants = get_resto();

// Récupérer la liste complète des menus
$menus = getlist_menus();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administration des restaurants</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&family=Shrikhand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel='stylesheet' href="./css/style.css">
    <script src="https://kit.fontawesome.com/ece17b4c54.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>

<body>


    <div class="container2">
        <header>
            <div class="header_return">
                <a href="./index.html"><i class="fa-solid fa-arrow-left"></i></a>
                <img src="./img/logo/logo.png" alt="logo">
            </div>

        </header>

        <!-- Ajouter un plat -->
        <section id="ajouter_plat">
            <h2>Ajouter un plat</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id_resto" value="<?php echo $id_resto; ?>">
                <label for="nom_plat">Nom du plat:</label><br>
                <input type="text" id="nom_plat" name="nom_plat"><br>
                <label for="commentaire_plat">Commentaire:</label><br>
                <input type="text" id="commentaire_plat" name="commentaire_plat"><br>
                <label for="prix_plat">Prix:</label><br>
                <input type="number" id="prix_plat" name="prix_plat" min="0"><br><br>
                <input type="submit" value="Ajouter plat" name="ajouter_plat">
            </form>
        </section>

        <!-- Modifier un plat -->
        <section id="modifier_plat">
            <h2>Modifier un plat</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="plat_id">Sélectionnez un plat:</label><br>
                <select id="plat_id" name="plat_id">
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo $menu['id_plat']; ?>"><?php echo $menu['nom_plat']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="nouveau_nom_plat">Nouveau nom:</label><br>
                <input type="text" id="nouveau_nom_plat" name="nouveau_nom_plat"><br>
                <label for="nouveau_commentaire_plat">Nouveau commentaire:</label><br>
                <input type="text" id="nouveau_commentaire_plat" name="nouveau_commentaire_plat"><br>
                <label for="nouveau_prix_plat">Nouveau prix:</label><br>
                <input type="number" id="nouveau_prix_plat" name="nouveau_prix_plat" min="0"><br><br>
                <input type="submit" value="Modifier plat" name="modifier_plat">
            </form>
        </section>

        <!-- Supprimer un plat -->
        <section id="supprimer_plat">
            <h2>Supprimer un plat</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="plat_id_suppr">Sélectionnez un plat:</label><br>
                <select id="plat_id_suppr" name="plat_id">
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo $menu['id_plat']; ?>"><?php echo $menu['nom_plat']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <input type="submit" value="Supprimer plat" name="supprimer_plat">
            </form>
        </section>

        <!-- Ajouter une entrée -->
        <section id="ajouter_entree">
            <h2>Ajouter une entrée</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id_resto" value="<?php echo $id_resto; ?>">
                <label for="nom_entree">Nom de l'entrée:</label><br>
                <input type="text" id="nom_entree" name="nom_entree"><br>
                <label for="commentaire_entree">Commentaire:</label><br>
                <input type="text" id="commentaire_entree" name="commentaire_entree"><br>
                <label for="prix_entree">Prix:</label><br>
                <input type="number" id="prix_entree" name="prix_entree" min="0"><br><br>
                <input type="submit" value="Ajouter entrée" name="ajouter_entree">
            </form>
        </section>

        <!-- Modifier une entrée -->
        <section id="modifier_entree">
            <h2>Modifier une entrée</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="entree_id">Sélectionnez une entrée:</label><br>
                <select id="entree_id" name="entree_id">
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo $menu['id_entree']; ?>"><?php echo $menu['nom_entree']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="nouveau_nom_entree">Nouveau nom:</label><br>
                <input type="text" id="nouveau_nom_entree" name="nouveau_nom_entree"><br>
                <label for="nouveau_commentaire_entree">Nouveau commentaire:</label><br>
                <input type="text" id="nouveau_commentaire_entree" name="nouveau_commentaire_entree"><br>
                <label for="nouveau_prix_entree">Nouveau prix:</label><br>
                <input type="number" id="nouveau_prix_entree" name="nouveau_prix_entree" min="0"><br><br>
                <input type="submit" value="Modifier entrée" name="modifier_entree">
            </form>
        </section>

        <!-- Supprimer une entrée -->
        <section id="supprimer_entree">
            <h2>Supprimer une entrée</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="entree_id_suppr">Sélectionnez une entrée:</label><br>
                <select id="entree_id_suppr" name="entree_id">
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo $menu['id_entree']; ?>"><?php echo $menu['nom_entree']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <input type="submit" value="Supprimer entrée" name="supprimer_entree">
            </form>
        </section>

        <!-- Ajouter un dessert -->
        <section id="ajouter_dessert">
            <h2>Ajouter un dessert</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id_resto" value="<?php echo $id_resto; ?>">
                <label for="nom_dessert">Nom du dessert:</label><br>
                <input type="text" id="nom_dessert" name="nom_dessert"><br>
                <label for="commentaire_dessert">Commentaire:</label><br>
                <input type="text" id="commentaire_dessert" name="commentaire_dessert"><br>
                <label for="prix_dessert">Prix:</label><br>
                <input type="number" id="prix_dessert" name="prix_dessert" min="0"><br><br>
                <input type="submit" value="Ajouter dessert" name="ajouter_dessert">
            </form>
        </section>

        <!-- Modifier un dessert -->
        <section id="modifier_dessert">
            <h2>Modifier un dessert</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="dessert_id">Sélectionnez un dessert:</label><br>
                <select id="dessert_id" name="dessert_id">
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo $menu['id_dessert']; ?>"><?php echo $menu['nom_dessert']; ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="nouveau_nom_dessert">Nouveau nom:</label><br>
                <input type="text" id="nouveau_nom_dessert" name="nouveau_nom_dessert"><br>
                <label for="nouveau_commentaire_dessert">Nouveau commentaire:</label><br>
                <input type="text" id="nouveau_commentaire_dessert" name="nouveau_commentaire_dessert"><br>
                <label for="nouveau_prix_dessert">Nouveau prix:</label><br>
                <input type="number" id="nouveau_prix_dessert" name="nouveau_prix_dessert" min="0"><br><br>
                <input type="submit" value="Modifier dessert" name="modifier_dessert">
            </form>
        </section>

        <!-- Supprimer un dessert -->
        <section id="supprimer_dessert">
            <h2>Supprimer un dessert</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="dessert_id_suppr">Sélectionnez un dessert:</label><br>
                <select id="dessert_id_suppr" name="dessert_id">
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo $menu['id_dessert']; ?>"><?php echo $menu['nom_dessert']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <input type="submit" value="Supprimer dessert" name="supprimer_dessert">
            </form>
        </section>

    </div>

</body>

</html>