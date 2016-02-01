<?php

namespace maru;

use pocketmine\plugin\PluginBase;
use pocketmine\block\Block;
use pocketmine\item\Item;
use maru\block\DarkOakWoodStairs;
use maru\block\JungleWoodStairs;
use maru\block\SpruceWoodStairs;

class BreakPatch extends PluginBase{
	public function onEnable() {
		$this->registerBlock(DarkOakWoodStairs::DARK_OAK_WOOD_STAIRS, DarkOakWoodStairs::class);
		$this->registerBlock(JungleWoodStairs::JUNGLE_WOOD_STAIRS, JungleWoodStairs::class);
		$this->registerBlock(SpruceWoodStairs::SPRUCE_WOOD_STAIRS, SpruceWoodStairs::class);
	}
	public function registerBlock($id, $class){
		Block::$list[$id] = $class;
		if($id < 255){
			Item::$list[$id] = $class;
			if(!Item::isCreativeItem($item = Item::get($id))){
				Item::addCreativeItem($item);
			}
		}
		for($data = 0; $data < 16; ++$data){
			Block::$fullList[($id << 4) | $data] = new $class($data);
		}
	}
}