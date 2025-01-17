<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
 */

declare(strict_types=1);

namespace pocketmine\command\defaults;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\InvalidCommandSyntaxException;
use pocketmine\lang\KnownTranslationFactory;
use pocketmine\permission\DefaultPermissionNames;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use function array_shift;
use function count;
use function implode;

class ReloadCommand extends VanillaCommand{

	public function __construct(){
		parent::__construct(
			"reload",
			"Sunucuyu yeniler",
			"/reload"
		);
		$this->setPermission(DefaultPermissionNames::COMMAND_RELOAD);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){

		if (!$sender->hasPermission("pocketmine.command.reload")) {
			return true;
		}

		Command::broadcastCommandMessage($sender, TextFormat::YELLOW."Sunucu yenileniyor...");

		$sender->getServer()->reload();
		Command::broadcastCommandMessage($sender, TextFormat::YELLOW."Sunucu yenilendi.");

		return true;
	}
}
