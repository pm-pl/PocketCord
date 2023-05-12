<?php

namespace CJMustard1452\PocketCord\Commands;

use CJMustard1452\PocketCord\Lib\DataModule;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\permission\Permission;
use pocketmine\permission\PermissionManager;

class PocketcordCommand extends Command  {

    private $dataModule;

    public function __construct(DataModule $dataModule) {
        PermissionManager::getInstance()->addPermission(new Permission('PocketCord.admin'));
        $this->setDescription('Allows access to edit webhook URLs.');
        $this->setPermission('PocketCord.admin');
        $this->dataModule = $dataModule;
    }

    public function execute(CommandSender $sender, $commandLabel, array $args) {
        if(isset($args[0])) {
            if(str_starts_with($args[0], 'https://discord.com/api/webhooks')) {
                $this->dataModule->setWebhookURL($args[0]);
                $sender->sendMessage('§7(§3PocketCord§r§7) §aYou have set a new webhook URL.');
            } else $sender->sendMessage('§7(§3PocketCord§r§7) §cThis is not a valid webhook URL.'); 
        } else $sender->sendMessage('§7(§3PocketCord§r§7) §cPlease enter a webhook URL.');
        return true;
    }
}
