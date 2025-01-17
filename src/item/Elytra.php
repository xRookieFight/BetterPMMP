<?php

declare(strict_types = 1);

namespace pocketmine\item;

use pocketmine\item\Armor;

class Elytra extends Armor{


	protected function onBroken(): void{
		//NOOP
	}
}