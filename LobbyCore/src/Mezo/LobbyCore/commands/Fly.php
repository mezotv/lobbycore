<?php

namespace Mezo\LobbyCore\commands;

use Mezo\LobbyCore\Main;

use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class Fly extends PluginCommand
{
    public function __construct()
    {
        parent::__construct("fly", Main::getMain());
        $this->setDescription("Makes you grow Wings!");
        $this->setPermission("cmd.fly");
    }
    function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player)
        {
            if(isset($this->flylist[$sender->getName()]))
            {
                unset($this->flyList[$sender->getName()]);
                $sender->setAllowFlight(false);
                $sender->sendPopup("§cFlying is now disabled");
            }
            else
            {
                $this->flyList[$sender->getName()] = $sender->getName();
                $sender->setAllowFlight(true);
                $sender->sendPopup("§aFlying is now enabled");
            }
        }
    }
    public $flyList = [];
}