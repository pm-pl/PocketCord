<?php

namespace CJMustard1452\PocketCord\Lib;

class SetupModule {

    final function __construct(DataModule $dataModule) {
		if($dataModule->checkWebhookURL()) return;
        $dataModule->sendWarning('Please use /pocketcord (Webhook URL) to enable logging.');
    } 
}