<?php

namespace Mezo\LobbyCore;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    private static $main;
    public function onEnable()
    {
        self::$main = $this;

        $this->getLogger()->info("§eLobbyCore by Mezo has been §aenabled!");
        $this->getServer()->getPluginManager()->registerEvents(new LobbyCore(), $this);
        $this->getServer()->getCommandMap()->registerAll("LC" [new FLy()]);
    }
    public function onDisable()
    {
        self::$main = $this;

        $this->getLogger()->info("§eLobbyCore by Mezo has been §adisabled!");
    }

    public static function getMain(): self
    {
        return self::$main;
    }
}