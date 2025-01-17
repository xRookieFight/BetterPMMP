<?php

declare(strict_types=1);

namespace pocketmine\entity\animation;

use pocketmine\entity\FireworksRocket;
use pocketmine\network\mcpe\protocol\ActorEventPacket;
use pocketmine\network\mcpe\protocol\types\ActorEvent;

class FireworkParticleAnimation implements Animation
{
	/** @var FireworksRocket */
	private FireworksRocket $firework;

	public function __construct(FireworksRocket $firework)
	{
		$this->firework = $firework;
	}

	public function encode(): array
	{
		return [
			ActorEventPacket::create($this->firework->getId(), ActorEvent::FIREWORK_PARTICLES, 0)
		];
	}
}