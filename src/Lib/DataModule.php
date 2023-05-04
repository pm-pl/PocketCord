<?php

namespace CJMustard1452\PocketCord\Lib;

use CJMustard1452\PocketCord\Main;

class DataModule {

    private $cache = [];
    private $dataFile;
    private $plugin;

    public function __construct(Main $plugin) {
        $this->checkDataFile($plugin->getDataFolder());
        $this->dataFile = json_decode(file_get_contents($plugin->getDataFolder() . 'data.json'), true);
        $this->plugin = $plugin;
    }

    private function checkDataFile(String $dataFolder):void {
        if(file_exists($dataFolder . 'data.json')) return;
        fopen($dataFolder . 'data.json', 'w+');
        file_put_contents($dataFolder . 'data.json', '{"WebhookURL": false}');
    }

    final function sendWarning(String $content):void {
        $this->plugin->getLogger()->warning($content);
    }

    final function setWebhookURL(String $URL):void {
        $this->dataFile['WebhookURL'] = $URL;
        file_put_contents($this->plugin->getDataFolder() . 'data.json', json_encode($this->dataFile));
    }

    final function getWebhookURL():string {
        return $this->dataFile['WebhookURL'];
    }

    final function checkWebhookURL():bool {
        if($this->dataFile['WebhookURL']) return true;
        else return false;
    }

    final function getCache():array {
        return $this->cache;
    }

    final function addToCache(String $string):void {
        array_push($this->cache, $string);
    }

    final function cleanCache():string {
        $msg = str_replace('@', '@ ', $this->cache);
        return implode("\n", $msg);
    }

    final function clearCache():void {
        $this->cache = [];
    }
}