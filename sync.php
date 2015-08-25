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
	$query->equalTo('user', $user);
	$query->equalTo('status', 'inprogress');
	$query->descending('startingAt');

	//on retourne la liste des synchro de l'utilisateur non terminées
	$result = $query->find();

	// on récupère tous les entrainements sauvegardées dont la synchro n'est pas terminées
	$query_workouts = new ParseQuery('Workouts');
	$query_workouts->containedIn('sync', $result);

	//on renvoit les workouts
	$workouts = $query_workouts->find();

	//on detruit les objets
	foreach ($result as $value) {
		fail($value);
	}
	$workouts->destroyAll();

}

function	getLastCompletedSyncForUser($user) {
	$query = new ParseQuery("ProviderSync");
	$query->equalTo('user', $user);
	$query->equalTo('status', 'complete');
	$query->descending('endedAt');

	return $query->first();
}



function	start($user, $provider) {
	$sync = new ParseObject('ProviderSync');

	$sync->set('user', $user);
	$sync->set('provider', $provider);
	$sync->set('startedAt', new Date());
	$sync->set('status', 'inprogress');

	return $sync->save();
}

function	complete($sync, $done_count) {
	$sync->set('endedAt', new Date());
	$sync->set('doneCount', $done_count);
	$sync->set('status', 'complete');

	return $sync->save();
}

function	fail($sync) {
	$sync->set('endedAt', new Date());
	$sync->set('status', 'failed');

	return $sync->save();
}
