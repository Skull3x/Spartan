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

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\nbt\tag\Compound;
use pocketmine\nbt\tag\Int;
use pocketmine\nbt\tag\String;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\Enum;
use pocketmine\Player;
use pocketmine\tile\Tile;
use pocketmine\tile\BrewingStand as TileBrewingStand;
use pocketmine\math\Vector3;

class BrewingStand extends Transparent {

        protected $id = self::BREWING_STAND;

        public function __construct($meta = 0) {
                $this->meta = $meta;
        }

        public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null) {
                if($block->getSide(Vector3::SIDE_DOWN)->isTransparent() === false) {
                        $this->getLevel()->setBlock($block, $this, true, true);
                        $nbt = new Compound("", [
                            new Enum("Items", []),
                            new String("id", Tile::BREWING_STAND),
                            new Int("x", $this->x),
                            new Int("y", $this->y),
                            new Int("z", $this->z)
                        ]);
                        $nbt->Items->setTagType(NBT::TAG_Compound);
                        if($item->hasCustomName()) {
                                $nbt->CustomName = new String("CustomName", $item->getCustomName());
                        }

                        if($item->hasCustomBlockData()) {
                                foreach($item->getCustomBlockData() as $key => $v) {
                                        $nbt->{$key} = $v;
                                }
                        }

                        Tile::createTile(Tile::BREWING_STAND, $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);

                        return true;
                }
                return false;
        }

        public function canBeActivated() {
                return true;
        }

        public function getHardness() {
                return 3;
        }

        public function getName() {
                return "Brewing Stand";
        }

        public function onActivate(Item $item, Player $player = null) {
                if($player instanceof Player) {
                        //TODO lock
                        if($player->isCreative()) {
                                return true;
                        }
                        $t = $this->getLevel()->getTile($this);
                        $brewingStand = false;
                        if($t instanceof TileBrewingStand) {
                                $brewingStand = $t;
                        } else {
                                $nbt = new Compound("", [
                                    new Enum("Items", []),
                                    new String("id", Tile::BREWING_STAND),
                                    new Int("x", $this->x),
                                    new Int("y", $this->y),
                                    new Int("z", $this->z)
                                ]);
                                $nbt->Items->setTagType(NBT::TAG_Compound);
                                $brewingStand = Tile::createTile(Tile::BREWING_STAND, $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);
                        }
                        $player->addWindow($brewingStand->getInventory());
                }

                return true;
        }

        public function getDrops(Item $item) {
                $drops = [];
                if($item->isPickaxe() >= Tool::TIER_WOODEN) {
                        $drops[] = [Item::BREWING_STAND, 0, 1];
                }

                return $drops;
        }

}
