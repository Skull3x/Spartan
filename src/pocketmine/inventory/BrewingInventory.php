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

namespace pocketmine\inventory;

use pocketmine\item\Item;
use pocketmine\tile\BrewingStand;

class BrewingInventory extends ContainerInventory {

        public function __construct(BrewingStand $tile) {
                parent::__construct($tile, InventoryType::get(InventoryType::BREWING_STAND));
        }

        /**
         * @return BrewingStand
         */
        public function getHolder() {
                return $this->holder;
        }

        public function setIngredient(Item $item) {
                $this->setItem(0, $item);
        }

        /**
         * @return Item
         */
        public function getIngredient() {
                return $this->getItem(0);
        }

        public function onSlotChange($index, $before) {
                parent::onSlotChange($index, $before);

                $this->getHolder()->scheduleUpdate();
        }

}
