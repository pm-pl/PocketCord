<?php

namespace CJMustard1452\PocketCord;

use CJMustard1452\PocketCord\Lib\DataModule;
use CJMustard1452\PocketCord\Commands\PocketcordCommand;
use CJMustard1452\PocketCord\Lib\SetupModule;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	protected function onEnable(): void {
		$dataModule = new DataModule($this);
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($dataModule), $this);
        	$this->getServer()->getCommandMap()->register("pocketcord", new PocketcordCommand($dataModule));
		new SetupModule($this, $dataModule);
	}
}
