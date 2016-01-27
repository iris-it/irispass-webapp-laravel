<?php
$I = new FunctionalTester($scenario);

$I->am('an user');
$I->wantTo('Update a group');

$I->haveRecord('osjs_groups', [
    'name' => 'test_group',
    'path' => '/var/www/test',
    'organization_id' => '1',
    'created_at' => '2015-05-08 00:00:00',
    'updated_at' => '2015-05-08 00:00:00'
]);

//setup
$I->amAuthenticatedWithCredentials();
$I->amOnAction('OsjsGroupsController@index');

$I->click("//*[text()[contains(.,'test_group')]]/following-sibling::td[2]/a[1]");

$I->click("Editer");

//modify user
$I->fillField(['name' => 'name'], 'test_groups_2');
$I->click('submit-osjs-groups-create');

$I->amOnAction('OsjsGroupsController@index');

$I->see('test_groups_2');