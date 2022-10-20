<?php

namespace TungstenVn\SeasonPass\menuHandle;

use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\player\Player;

class loadMenu
{

    public function __construct(menuHandle $mnh, $sender, $corner, $matrix)
    {
        $this->onLoad($mnh, $sender, $corner, $matrix);
    }

    public function onLoad($mnh, Player $sender, $corner, $matrix)
    {
        for ($x = $corner[0]; $x < $corner[0] + 5; $x++) {
            for ($y = $corner[1]; $y < $corner[1] + 7; $y++) {
                $slotId = $x * 9 + $y - $corner[1] + 2;
                if (isset($matrix[$x][$y])) {
                    if (is_numeric($matrix[$x][$y])) {
                        if ($x == 0) {
                            $item = $mnh->cmds->ssp->getConfig()->getNested('normalPass')[$y];
                            $item = json_decode(utf8_decode($item));
                            $mnh->menu->getInventory()->setItem($slotId, Item::jsonDeserialize((array)$item));
                        } else {
                            $item = $mnh->cmds->ssp->getConfig()->getNested('royalPass')[$y];
                            $item = json_decode(utf8_decode($item));
                            $mnh->menu->getInventory()->setItem($slotId, Item::jsonDeserialize((array)$item));
                        }
                    } else if ($matrix[$x][$y] == "n") {
                        $mnh->menu->getInventory()->setItem($slotId, ItemFactory::getInstance()->get(0, 0, 0));
                    } else if ($matrix[$x][$y] == "taken") {
                        $mnh->menu->getInventory()->setItem($slotId, ItemFactory::getInstance()->get(241, 5, 1));
                    } else if ($matrix[$x][$y] == "none") {
                        $mnh->menu->getInventory()->setItem($slotId, ItemFactory::getInstance()->get(241, 14, 1));
                    } else if ($matrix[$x][$y] == "crossline") {
                        $mnh->menu->getInventory()->setItem($slotId, ItemFactory::getInstance()->get(399, 0, 1));
                    }
                } else {
                    $mnh->menu->getInventory()->setItem($slotId, ItemFactory::getInstance()->get(0, 0, 0));
                }
            }
        }
    }
}