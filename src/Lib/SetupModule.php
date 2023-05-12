<?php

namespace CJMustard1452\PocketCord\Lib;

use CJMustard1452\PocketCord\WebhookAPI\WebhookTask;
use CJMustard1452\PocketCord\Main;

class SetupModule {

    final function __construct(Main $main, DataModule $dataModule) {
		if($dataModule->checkWebhookURL()) return;
        $dataModule->sendWarning('Please use /pocketcord (Webhook URL) to enable logging.');
        $main->getScheduler()->scheduleRepeatingTask(new WebhookTask($dataModule), 10);
    } 
}
