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

namespace pocketmine\item;

use pocketmine\level\Level;
use pocketmine\block\Block;
use pocketmine\Player;
use pocketmine\nbt\tag\Compound;
use pocketmine\nbt\tag\Enum;
use pocketmine\nbt\tag\Double;
use pocketmine\nbt\tag\Float;
use pocketmine\entity\Boat as BoatEntity;

class Boat extends Item {

        public function __construct($meta = 0, $count = 1) {
                parent::__construct(self::BOAT, $meta, $count, "Boat");
        }

        public function canBeActivated() {
                return true;
        }

        public function onActivate(Level $level, Player $player, Block $block, Block $target, $face, $fx, $fy, $fz) {
                $realPos = $block->getSide($face);

                $boat = new BoatEntity($player->getLevel()->getChunk($realPos->getX() >> 4, $realPos->getZ() >> 4), new Compound("", [
                    "Pos" => new Enum("Pos", [
                        new Double("", $realPos->getX()),
                        new Double("", $realPos->getY()),
                        new Double("", $realPos->getZ())
                            ]),
                    "Motion" => new Enum("Motion", [
                        new Double("", 0),
                        new Double("", 0),
                        new Double("", 0)
                            ]),
                    "Rotation" => new Enum("Rotation", [
                        new Float("", 0),
                        new Float("", 0)
                            ]),
                ]));
                $boat->spawnToAll();

                if($player->isSurvival()) {
                        $item = $player->getInventory()->getItemInHand();
                        $count = $item->getCount();
                        if(--$count <= 0) {
                                $player->getInventory()->setItemInHand(Item::get(Item::AIR));
                                return true;
                        }

                        $item->setCount($count);
                        $player->getInventory()->setItemInHand($item);
                }

                return true;
        }

}
