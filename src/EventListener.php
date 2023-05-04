<?php

namespace CJMustard1452\PocketCord;

use CJMustard1452\PocketCord\Lib\DataModule;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class EventListener implements Listener {
    
    private $dataModule;

    final function __construct(DataModule $dataModule) {
        $this->dataModule = $dataModule;
    }

    final function onChat(PlayerChatEvent $e):void {
        $this->dataModule->addToCache('->**' . $e->getPlayer()->getName() . '**> ' . $e->getMessage());
    }
}