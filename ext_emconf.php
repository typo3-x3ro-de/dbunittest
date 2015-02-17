<?php

$EM_CONF[$_EXTKEY] = array (
	'title' => 'DB Unit Test',
	'description' => 'Example extension demonstrating unit testing for methods accessing the database.',
	'category' => 'misc',
	'version' => '0.0.0',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Lucas Jenß',
	'author_email' => 'public@x3ro.de',
	'author_company' => '',
	'constraints' =>
		array (
			'depends' =>
				array (
					'php' => '5.3.0-5.6.99',
					'typo3' => '6.2.4-7.0.99',
				),
			'conflicts' =>
				array (
				),
			'suggests' =>
				array (
				),
		),
);

