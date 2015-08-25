<?php

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
