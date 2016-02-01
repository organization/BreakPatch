<?php

namespace maru;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use ifteam\SimpleArea\database\world\WhiteWorldProvider;
use ifteam\SimpleArea\database\area\AreaProvider;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat as Color;

class BreakPatch extends PluginBase implements Listener {
	
	private $simplearea = false, $whiteworld, $area;
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		if ($this->getServer()->getPluginManager()->getPlugin("SimpleArea") instanceof Plugin) {
			$this->whiteworld = WhiteWorldProvider::getInstance();
			$this->area = AreaProvider::getInstance();
			$this->simplearea = true;
			$this->getLogger()->info(Color::AQUA."심플에리어 연동 완료!");
		}
	}
	/**
	 * 
	 * @return boolean
	 */
	public function isSimpleAreaEnabled() {
		return $this->simplearea;
	}
	/**
	 * 
	 * @priority HIGHEST
	 */
	public function onBreak(BlockBreakEvent $event) {
		if ($event->isCancelled())
			return;
		$player = $event->getPlayer();
		$block = $event->getBlock();
		$block->getLevel()->setBlock(new Vector3($block->getX(), $block->getY(), $block->getZ()), Block::get(0));
	}
}