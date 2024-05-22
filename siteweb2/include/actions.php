<?php

require_once "connectdb.php";

function insert_plat($nom_plat, $commentaire_plat, $prix_plat, $id_resto) {
    $db = connectdb();
    $request = $db->prepare("INSERT INTO plats (nom_plat, commentaire_plat, prix, id_resto) VALUES (?, ?, ?, ?)");
    $request->execute([$nom_plat, $commentaire_plat, $prix_plat, $id_resto]);
}

function update_plat($plat_id, $nouveau_nom_plat, $nouveau_commentaire_plat, $nouveau_prix_plat) {
    $db = connectdb();
    $request = $db->prepare("UPDATE plats SET nom_plat=?, commentaire_plat=?, prix=? WHERE id_plat=?");
    $request->execute([$nouveau_nom_plat, $nouveau_commentaire_plat, $nouveau_prix_plat, $plat_id]);
}

function delete_plat($plat_id) {
    $db = connectdb();
    $request = $db->prepare("DELETE FROM plats WHERE id_plat=?");
    $request->execute([$plat_id]);
}

function insert_entree($nom_entree, $commentaire_entree, $prix_entree, $id_resto) {
    $db = connectdb();
    $request = $db->prepare("INSERT INTO entree (nom_entree, commentaire_entree, prix, id_resto) VALUES (?, ?, ?, ?)");
    $request->execute([$nom_entree, $commentaire_entree, $prix_entree, $id_resto]);
}

function update_entree($entree_id, $nouveau_nom_entree, $nouveau_commentaire_entree, $nouveau_prix_entree) {
    $db = connectdb();
    $request = $db->prepare("UPDATE entree SET nom_entree=?, commentaire_entree=?, prix=? WHERE id_entree=?");
    $request->execute([$nouveau_nom_entree, $nouveau_commentaire_entree, $nouveau_prix_entree, $entree_id]);
}

function delete_entree($entree_id) {
    $db = connectdb();
    $request = $db->prepare("DELETE FROM entree WHERE id_entree=?");
    $request->execute([$entree_id]);
}

function insert_dessert($nom_dessert, $commentaire_dessert, $prix_dessert, $id_resto) {
    $db = connectdb();
    $request = $db->prepare("INSERT INTO desserts (nom_dessert, commentaire_dessert, prix, id_resto) VALUES (?, ?, ?, ?)");
    $request->execute([$nom_dessert, $commentaire_dessert, $prix_dessert, $id_resto]);
}

function update_dessert($dessert_id, $nouveau_nom_dessert, $nouveau_commentaire_dessert, $nouveau_prix_dessert) {
    $db = connectdb();
    $request = $db->prepare("UPDATE desserts SET nom_dessert=?, commentaire_dessert=?, prix=? WHERE id_dessert=?");
    $request->execute([$nouveau_nom_dessert, $nouveau_commentaire_dessert, $nouveau_prix_dessert, $dessert_id]);
}

function delete_dessert($dessert_id) {
    $db = connectdb();
    $request = $db->prepare("DELETE FROM desserts WHERE id_dessert=?");
    $request->execute([$dessert_id]);
}

function get_resto() {
    $db = connectdb();
    $request = $db->prepare("SELECT * FROM restos");
    $request->execute();
    $restos = $request->fetchAll();
    return $restos;
}

function get_menus($id_resto) {
    $db = connectdb();

    $get_dessert = $db->prepare("SELECT * FROM desserts WHERE id_resto=?");
    $get_dessert->execute([$id_resto]);
    $desserts = $get_dessert->fetchAll();

    $get_entree = $db->prepare("SELECT * FROM entree WHERE id_resto=?");
    $get_entree->execute([$id_resto]);
    $entree = $get_entree->fetchAll();

    $get_plat = $db->prepare("SELECT * FROM plats WHERE id_resto=?");
    $get_plat->execute([$id_resto]);
    $plats = $get_plat->fetchAll();

    $menus = array(
        "entree" => $entree,
        "plat" => $plats,
        "dessert" => $desserts
    );

    return $menus;
}

function getlist_menus() {
    $db = connectdb();

    $get_menus = $db->prepare("SELECT 
        restos.nom_resto AS nom_restaurant,
        plats.nom_plat AS nom_plat,
        desserts.nom_dessert AS nom_dessert,
        entree.nom_entree AS nom_entree
    FROM 
        restos
    JOIN 
        plats ON restos.id_resto = plats.id_resto
    JOIN 
        desserts ON restos.id_resto = desserts.id_resto
    JOIN 
        entree ON restos.id_resto = entree.id_resto");
    $get_menus->execute();
    $menus = $get_menus->fetchAll();

    return $menus;
}