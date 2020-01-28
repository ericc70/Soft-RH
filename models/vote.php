<?php

// function getVoteByDay()
// {
    global $pdo;

    $sql = "SELECT COUNT(id)as id,`date` FROM vote";
    echo $sql;
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
// }

