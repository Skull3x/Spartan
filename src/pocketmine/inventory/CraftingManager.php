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
use pocketmine\utils\UUID;

class CraftingManager{

	/** @var Recipe[] */
	public $recipes = [];

	/** @var Recipe[][] */
	protected $recipeLookup = [];

	/** @var FurnaceRecipe[] */
	public $furnaceRecipes = [];

	private static $RECIPE_COUNT = 0;

	public function __construct(){
                $this->registerRecipes();
	}

	/**
	 * @param UUID $id
	 * @return Recipe
	 */
	public function getRecipe(UUID $id){
		$index = $id->toBinary();
		return isset($this->recipes[$index]) ? $this->recipes[$index] : null;
	}

	/**
	 * @return Recipe[]
	 */
	public function getRecipes(){
		return $this->recipes;
	}
        
        public function registerRecipes() {
//                //Andesite
//                $this->registerRecipe(new ShapelessRecipe(Item::get(Item::STONE, 5, 2), [
//                    Item::get(Item::STONE, 3, 1),
//                    Item::get(Item::COBBLESTONE, 0, 1)
//                ]));
//                //Polished Andesite
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::STONE, 6, 4), [
//                    Item::get(Item::STONE, 5, 4)
//                ]));
//                //Coal Block
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::COAL_BLOCK, 0, 1), [
//                    Item::get(Item::COAL, 0, 9)
//                ]));
//                //Iron Block
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::IRON_BLOCK, 0, 1), [
//                    Item::get(Item::IRON_INGOT, 0, 9)
//                ]));
//                //Clay Block
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::CLAY_BLOCK, 0, 1), [
//                    Item::get(Item::CLAY, 0, 4)
//                ]));
//                //Cobblestone Wall
//                $this->registerRecipe(new ShapedRecipe(3, 2, Item::get(Item::COBBLESTONE_WALL, 0, 1), [
//                    Item::get(Item::COBBLESTONE, 0, 6)
//                ]));
//                //Mossy Cobblestone Wall
//                $this->registerRecipe(new ShapedRecipe(3, 2, Item::get(Item::COBBLESTONE_WALL, 1, 1), [
//                    Item::get(Item::MOSSY_STONE, 0, 6)
//                ]));
//                //Diorite
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::STONE, 3, 2), [
//                    Item::get(Item::COBBLESTONE, 0, 2),
//                    Item::get(Item::NETHER_QUARTZ, 0, 2)
//                ]));
//                //Polished Diorite
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::STONE, 4, 4), [
//                    Item::get(Item::STONE, 3, 4)
//                ]));
//                //Jack 'oLantern
//                $this->registerRecipe(new ShapedRecipe(1, 2, Item::get(Item::JACK_O_LANTERN, 0, 1), [
//                    Item::get(Item::PUMPKIN, 0, 1),
//                    Item::get(Item::TORCH, 0, 1)
//                ]));
//                //Mossy Cobblestone
//                $this->registerRecipe(new ShapelessRecipe(Item::get(Item::MOSSY_STONE, 0, 1), [
//                    Item::get(Item::COBBLESTONE, 0, 1),
//                    Item::get(Item::VINES, 0, 1)
//                ]));
//                //Stained Glass
//                //Not implemented to Pocket Edition yet :c
//                //Oak Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::OAK_WOOD_STAIRS, 0, 4), [
//                    Item::get(Item::WOOD, 0, 6)
//                ]));
//                //Spruce Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::SPRUCE_WOOD_STAIRS, 0, 4), [
//                    Item::get(Item::WOOD, 1, 6)
//                ]));
//                //Birch Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::BIRCH_WOOD_STAIRS, 0, 4), [
//                    Item::get(Item::WOOD, 2, 6)
//                ]));
//                //Jungle Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::JUNGLE_WOOD_STAIRS, 0, 4), [
//                    Item::get(Item::WOOD, 3, 6)
//                ]));
//                //Acacia Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::ACACIA_WOOD_STAIRS, 0, 4), [
//                    Item::get(Item::WOOD, 4, 6)
//                ]));
//                //Dark Oak Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::DARK_OAK_WOOD_STAIRS, 0, 4), [
//                    Item::get(Item::WOOD, 5, 6)
//                ]));
//                //Cobblestone Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::COBBLESTONE_STAIRS, 0, 4), [
//                    Item::get(Item::COBBLESTONE, 0, 6)
//                ]));
//                //Brick Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::BRICK_STAIRS, 0, 4), [
//                    Item::get(Item::BRICKS_BLOCK, 0, 6)
//                ]));
//                //Stone Brick Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STONE_BRICK_STAIRS, 0, 4), [
//                    Item::get(Item::STONE_BRICKS, 0, 6)
//                ]));
//                //Stone Brick Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STONE_BRICK_STAIRS, 0, 4), [
//                    Item::get(Item::STONE_BRICKS, 1, 6)
//                ]));
//                //Stone Brick Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STONE_BRICK_STAIRS, 0, 4), [
//                    Item::get(Item::STONE_BRICKS, 2, 6)
//                ]));
//                //Stone Brick Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STONE_BRICK_STAIRS, 0, 4), [
//                    Item::get(Item::STONE_BRICKS, 3, 6)
//                ]));
//                //Nether Brick Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::NETHER_BRICKS_STAIRS, 0, 4), [
//                    Item::get(Item::NETHER_BRICKS, 0, 6)
//                ]));
//                //Sandstone Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::SANDSTONE_STAIRS, 0, 4), [
//                    Item::get(Item::SANDSTONE, 0, 6)
//                ]));
//                //Sandstone Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::SANDSTONE_STAIRS, 0, 4), [
//                    Item::get(Item::SANDSTONE, 1, 6)
//                ]));
//                //Sandstone Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::SANDSTONE_STAIRS, 0, 4), [
//                    Item::get(Item::SANDSTONE, 2, 6)
//                ]));
//                //Quartz Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::QUARTZ_STAIRS, 0, 4), [
//                    Item::get(Item::QUARTZ_BLOCK, 0, 6)
//                ]));
//                //Quartz Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::QUARTZ_STAIRS, 0, 4), [
//                    Item::get(Item::QUARTZ_BLOCK, 1, 6)
//                ]));
//                //Quartz Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::QUARTZ_STAIRS, 0, 4), [
//                    Item::get(Item::QUARTZ_BLOCK, 2, 6)
//                ]));
//                //Quartz Stairs
//                $this->registerRecipe(new ShapelessRecipe(Item::get(Item::QUARTZ_STAIRS, 0, 4), [
//                    Item::get(Item::QUARTZ_BLOCK, 3, 6)
//                ]));
//                //Quartz Stairs
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::QUARTZ_STAIRS, 0, 4), [
//                    Item::get(Item::QUARTZ_BLOCK, 4, 6)
//                ]));
//                //Snow Block
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::SNOW_BLOCK, 0, 4), [
//                    Item::get(Item::SNOWBALL, 0, 1)
//                ]));
//                //Quartz Block
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::QUARTZ_BLOCK, 0, 4), [
//                    Item::get(Item::QUARTZ, 0, 1)
//                ]));
//                //Chiseled Quartz Block
//                $this->registerRecipe(new ShapedRecipe(1, 2, Item::get(Item::SLAB, 7, 2), [
//                    Item::get(Item::QUARTZ_BLOCK, 1, 1)
//                ]));
//                //Pillar Quartz Block
//                $this->registerRecipe(new ShapedRecipe(1, 2, Item::get(Item::QUARTZ_BLOCK, 1, 2), [
//                    Item::get(Item::QUARTZ_BLOCK, 0, 2)
//                ]));
//                //Glowstone
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::GLOWSTONE, 0, 1), [
//                    Item::get(Item::GLOWSTONE_DUST, 0, 4)
//                ]));
//                //Granite
//                $this->registerRecipe(new ShapelessRecipe(Item::get(Item::STONE, 1, 1), [
//                    Item::get(Item::COBBLESTONE, 3, 1),
//                    Item::get(Item::QUARTZ, 0, 1)
//                ]));
//                //Polished Granite
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::STONE, 2, 4), [
//                    Item::get(Item::STONE, 1, 4)
//                ]));
//                //Wheat Block
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::WHEAT, 0, 9), [
//                    Item::get(Item::WHEAT_BLOCK, 0, 1)
//                ]));
//                //Oak Planks
//                $this->registerRecipe(new ShapedRecipe(1, 1, Item::get(Item::PLANKS, 0, 4), [
//                    Item::get(Item::WOOD, 0, 1)
//                ]));
//                //Spruce Planks
//                $this->registerRecipe(new ShapedRecipe(1, 1, Item::get(Item::PLANKS, 1, 4), [
//                    Item::get(Item::WOOD, 1, 1)
//                ]));
//                //Birch Planks
//                $this->registerRecipe(new ShapedRecipe(1, 1, Item::get(Item::PLANKS, 2, 4), [
//                    Item::get(Item::WOOD, 2, 1)
//                ]));
//                //Jungle Planks
//                $this->registerRecipe(new ShapedRecipe(1, 1, Item::get(Item::PLANKS, 3, 4), [
//                    Item::get(Item::WOOD, 3, 1)
//                ]));
//                //Acacia Planks
//                $this->registerRecipe(new ShapedRecipe(1, 1, Item::get(Item::PLANKS, 4, 4), [
//                    Item::get(Item::WOOD2, 0, 1)
//                ]));
//                //Dark Oak Planks
//                $this->registerRecipe(new ShapedRecipe(1, 1, Item::get(Item::PLANKS, 5, 4), [
//                    Item::get(Item::WOOD2, 1, 1)
//                ]));
//                //Melon Block
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::MELON_BLOCK, 5, 4), [
//                    Item::get(Item::MELON_SLICE, 0, 9)
//                ]));
//                //Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 0, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 15, 1)
//                ]));
//                //White Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 0, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 15, 1)
//                ]));
//                //Orange Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 1, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 14, 1)
//                ]));
//                //Magenta Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 2, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 13, 1)
//                ]));
//                //Light Blue Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 3, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 12, 1)
//                ]));
//                //Yellow Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 4, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 11, 1)
//                ]));
//                //Lime Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 5, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 10, 1)
//                ]));
//                //Pink Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 6, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 9, 1)
//                ]));
//                //Gray Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 7, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 8, 1)
//                ]));
//                //Light Gray Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 8, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 7, 1)
//                ]));
//                //Cyan Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 9, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 6, 1)
//                ]));
//                //Purple Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 10, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 5, 1)
//                ]));
//                //Blue Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 11, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 6, 1)
//                ]));
//                //Brown Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 12, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 3, 1)
//                ]));
//                //Green Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 13, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 2, 1)
//                ]));
//                //Red Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 14, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 1, 1)
//                ]));
//                //Black Stained Clay
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::STAINED_CLAY, 15, 8), [
//                    Item::get(Item::HARDENED_CLAY, 0, 8),
//                    Item::get(Item::DYE, 0, 1)
//                ]));
//                //Gold Block
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::GOLD_BLOCK, 0, 1), [
//                    Item::get(Item::GOLD_INGOT, 0, 9)
//                ]));
//                //Wool
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::WOOL, 0, 1), [
//                    Item::get(Item::STRING, 0, 4)
//                ]));
//                //Emerald Block
//                $this->registerRecipe(new ShapedRecipe(3, 3, Item::get(Item::EMERALD_BLOCK, 0, 1), [
//                    Item::get(Item::EMERALD, 0, 9)
//                ]));
//                //Nether Brick Block
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::NETHER_BRICK_BLOCK, 0, 1), [
//                    Item::get(Item::NETHER_BRICK, 0, 4)
//                ]));
//                //Stone Bricks
//                $this->registerRecipe(new ShapedRecipe(2, 2, Item::get(Item::STONE_BRICKS, 0, 4), [
//                    Item::get(Item::STONE, 0, 4)
//                ]));
//                //Mossy Stone Bricks
//                $this->registerRecipe(new ShapelessRecipe(Item::get(Item::STONE_BRICKS, 1, 1), [
//                    Item::get(Item::STONE_BRICKS, 0, 1),
//                    Item::get(Item::VINES, 0, 1)
//                ]));
//                //Chiseled Stone Bricks
//                $this->registerRecipe(new ShapedRecipe(1, 2, Item::get(Item::STONE_BRICKS, 3, 1), [
//                    Item::get(Item::SLABS, 5, 2)
//                ]));
        }
        
        public function registerRecipe(Recipe $recipe) {
                $recipe->setId(UUID::fromData(++self::$RECIPE_COUNT, $recipe->getResult()->getId(), $recipe->getResult()->getDamage(), $recipe->getResult()->getCount(), $recipe->getResult()->getCompoundTag()));
                $this->recipes[$recipe->getId()->toBinary()] = $recipe;
        }

}
