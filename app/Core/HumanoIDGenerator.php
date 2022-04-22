<?php

namespace App\Core;

/**
 * Intermediary class that is bound as a Singleton in the AppServiceProvider.
 */
class HumanoIDGenerator
{
	public \RobThree\HumanoID\HumanoID $generator;
	
	public function __construct()
	{
		$this->generator = \RobThree\HumanoID\HumanoIDs::spaceIdGenerator();
	}
}