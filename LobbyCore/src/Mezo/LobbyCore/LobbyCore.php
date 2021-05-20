<?php

namespace Mezo\LobbyCore;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\item\Item;

class LobbyCore implements Listener
{
    public function onJoin(PlayerJoinEvent $event): bool
    {
        $player = $event->getPlayer();
        $player->teleport($player->getServer()->getDefaultLevel()->getSpawnLocation());
        $player->setGamemode(2);

        $slot3 = Item::get(130, 0, 1);
        $slot5 = Item::get(345, 0, 1);
        $slot7 = Item::get(397, 5, 1);


        $slot3->setCustomName("§5Extras");
        $slot5->setCustomName("§aGame Selector");
        $slot7->setCustomName("§6Profile");

        $player->getInventory()->clearAll();
        $player->getInventory()->setItem(2, $slot3);
        $player->getInventory()->setItem(4, $slot5);
        $player->getInventory()->setItem(6, $slot7);

        return true;
    }

    public function onInteract(PlayerInteractEvent $event): bool
    {
        $player = $event->getPlayer();
        $item = $event->getItem();
        $items = $player->getInventory()->getItemInHand()->getName();

        if ($item->getId() == 130 || $items == "§5Extras") {
            if ($player->hasPermission("gadgets.use")) {
                $slot1 = Item::get(288);
                $slot5 = Item::get(351, 1);

                $slot1->setCustomName("§6Fly");
                $slot5->setCustomName("§cBack");

                $player->getInventory()->clearAll();
                $player->getInventory()->setItem(0, $slot1);
                $player->getInventory()->setItem(4, $slot5);

                return true;

            }


        }

        if ($item->getId() == 288 || $items == "§6Fly") {
            $player->getServer()->getCommandMap()->dispatch($player, "fly");
        }

        if ($item->getId() == 345 || $items == "§aGame Selector") {
            $event->setCancelled();


        }
        if ($item->getId() == 397 || $items == "§6Profile") {
            $event->setCancelled();


            if ($item->getId() == 351 || $items == "§cBack") {
                $slot1 = Item::get(288);
                $slot5 = Item::get(351, 1);

                $slot1->setCustomName("§6Fly");
                $slot5->setCustomName("§cBack");

                $player->getInventory()->clearAll();
                $player->getInventory()->setItem(0, $slot1);
                $player->getInventory()->setItem(4, $slot5);

                return true;

            }
        }
    }
    public $portal = [];
    public $enchant = [];
    public $heart = [];
    public $flame = [];
    public $angry = [];
}

