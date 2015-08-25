<?php

function getUser($objectId){
    // on recupère le user en fonction de son id
    $query = new ParseUser::query("User");
    $query->equalTo("objectId", $objectId);
    $result = $query->first();

    // on renvoit l'utilisateur courant.
    return $result;
}

function deleteUnfinishedSyncsForUser($user) {

    // on récupère toutes les synchro non terminées
    $query = new ParseQuery("ProviderSync");
    $query->equalTo('user', array(
        "__type" => "Pointer",
        "className" => "_User",
        "objectId" => $user->getObjectId()
    ));
    $query->equalTo('status', 'inprogress');
    $query->descending('startingAt');

    //on retourne la liste des synchro de l'utilisateur non terminées
    $result = $query->find();

    // on récupère tous les entrainements sauvegardées dont la synchro n'est pas terminées
    $queryWorkouts = new ParseQuery('Workouts');
    $queryWorkouts->containedIn('sync', $result);

    //on renvoit les workouts
    $workouts = $queryWorkouts->find();

    //on detruit les objets
    $result->destroyAll();
    $workouts->destroyAll();
    

}