<?php

namespace CJMustard1452\PocketCord\WebhookAPI;
use CJMustard1452\PocketCord\Lib\DataModule;

class DispatchWebhook {

    private $dataModule;

    final function __construct(DataModule $dataModule) {
        $this->dataModule = $dataModule;
        if(!$dataModule->checkWebhookURL()) return;
        if(!$dataModule->getCache()) return;
        $this->sendWebhook();
        $this->dataModule->clearCache();
    }

    private function sendWebhook():void {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->dataModule->getWebhookURL());
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json; charset=utf-8']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['content' => $this->dataModule->cleanCache() ]));
        $response = curl_exec($ch);
    }
}