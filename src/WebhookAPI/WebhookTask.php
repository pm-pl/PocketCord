<?php

namespace CJMustard1452\PocketCord\WebhookAPI;

use CJMustard1452\PocketCord\Lib\DataModule;
use pocketmine\scheduler\Task;

class WebhookTask extends Task {

    private $ticks;
    private $cacheModule;

    final function __construct(DataModule $cacheModule) {
        $this->cacheModule = $cacheModule;
    }

    final function onRun():void {
        $this->ticks++;
        if($this->ticks <= 5) return;
        new DisbatchWebhook($this->cacheModule);
        $this->ticks = 0;
    }
}