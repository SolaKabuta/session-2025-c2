<?php

function getAllArticle(PDO $con):array
{
    $sql = "
    SELECT a.`idarticle`, a.`articletitle`, a.`articletext`, a.`articledate`, u.`username`
        FROM `article` a
        INNER JOIN `user` u
            ON u.`iduser` = a.`user_iduser`
    ORDER BY a.`articledate` DESC;
    ";

    try{
        $query = $con->query($sql);
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }catch (Exception $e){
        die($e->getMessage());
    }
}

function insertArticle(PDO $con, string $titre, string $text, int $idUser): bool
{
    $sql="
INSERT INTO `article`
(`articletitle`,`articletext`,`user_iduser`) VALUES
(?,?,?)";

    $titre = htmlspecialchars(strip_tags(trim($titre)),ENT_QUOTES);
    $text = htmlspecialchars(strip_tags(trim($text)),ENT_QUOTES);

    if(empty($titre)|| strlen($titre)> 160 || empty($text)) return false;

    $prepare = $con->prepare($sql);
    try{
        $prepare->execute([$titre,$text,$idUser]);
        return true;
    }catch(Exception $e){
        die($e->getMessage());
    }

}
