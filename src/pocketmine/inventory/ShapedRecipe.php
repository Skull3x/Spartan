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
use pocketmine\Server;
use pocketmine\utils\UUID;
use pocketmine\math\Vector2;

class ShapedRecipe implements Recipe{
        
        private $width = 0;
        
        private $height = 0;
        
	/** @var Item */
	private $output;
        
        private $id = null;

	/** @var Item[][] */
	private $ingredients = [];

	/**
	 * @param Item     $result
	 * @param string[] $shape
	 *
	 * @throws \Exception
	 */
	public function __construct($width, $height, Item $result, array $ingredients){
		if(count($ingredients) >= 9){
			throw new \InvalidArgumentException("Crafting recipies cannot have over 9 ingredients!");
		} elseif(count($ingredients) <= 0) {
                        throw new \InvalidArgumentException("Crafting recipies must have ingredients!");
                }
                
                $this->width = $width;
                $this->height = $height;
		$this->output = clone $result;
                $this->ingredients = $ingredients;
	}

	public function getWidth(){
		return $this->width;
	}

	public function getHeight(){
		return $this->height;
	}

	public function getResult(){
		return clone $this->output;
	}
        
        public function getId() {
                return $this->id;
        }
        
        public function setId(UUID $id) {
                $this->id = $id;
        }
        
        public function getIngredientList() {
                $ingredients = [];
		foreach($this->ingredients as $ingredient){
			$ingredients[] = clone $ingredient;
		}

		return $ingredients;
        }
        
        public function getIngredientCount() {
                $count = 0;
		foreach($this->ingredients as $ingredient){
			$count += $ingredient->getCount();
		}

		return $count;
        }

	public function register(){
		Server::getInstance()->getCraftingManager()->registerShapedRecipe($this);
	}
}