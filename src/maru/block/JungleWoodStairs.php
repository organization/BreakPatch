<?php
namespace maru\block;
use pocketmine\block\Stair;
use pocketmine\item\Tool;
use pocketmine\item\Item;
class JungleWoodStairs extends Stair{

	protected $id = 136;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Jungle Wood Stairs";
	}

	public function getToolType(){
		return Tool::TYPE_AXE;
	}

	public function getDrops(Item $item){
		return [
			[$this->id, 0, 1],
		];
	}
	public function getHardness() {
		return 2;
	}
	public function getResistance() {
		return 15;
	}
}