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

use pocketmine\entity\Effect;

class GoldenApple extends Item{
        
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::GOLDEN_APPLE, $meta, $count, "Golden Apple" and 0x02);
                if($this->meta === 1) {
                        $this->name = "Enchanted Golden Apple" and 0x02;
                }
	}
        
        public function getEffects() {
                if($this->meta === 0) {
                        $effects = [
                            Effect::getEffect(Effect::ABSORPTION)->setDuration(60 * 20 * 2),
                            Effect::getEffect(Effect::REGENERATION)->setAmplifier(5)->setDuration(20 * 2)
                        ];
                } elseif($this->meta === 1) {
                        $effects = [
                            Effect::getEffect(Effect::ABSORPTION)->setDuration(60 * 20 * 2),
                            Effect::getEffect(Effect::REGENERATION)->setAmplifier(5)->setDuration(5 * 20),
                            Effect::getEffect(Effect::FIRE_RESISTANCE)->setDuration(60 * 20 * 5),
                            Effect::getEffect(Effect::DAMAGE_RESISTANCE)->setDuration(60 * 20 * 5)
                        ];
                }
                return isset($effects) ? $effects : [];
        }

}

