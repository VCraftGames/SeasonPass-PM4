<?php

namespace TungstenVn\SeasonPass\menuHandle;

use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

use TungstenVn\SeasonPass\menuHandle\menuHandle;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\SharedInvMenu;
class createDefaultMenu
{
    public $menu;

    public function __construct(menuHandle $mnh, $sender)
    {
        $this->createMenu($sender);
    }

    public function createMenu($sender)
    {
        $menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST)
            ->setName("§fSkyBlock Pass");
        $normalBook = ItemFactory::getInstance()->get(340, 0, 1)->setCustomName("§a§l⊰ §fNormalPass §a⊱");
        $normalBook->setLore(["§a§l⊰ §fMọi người đều có thể yêu cầu vật phẩm trong thẻ này"]);

        $royalBook = ItemFactory::getInstance()->get(387, 0, 1)->setCustomName("§a§l⊰ §6RoyalPass §a⊱");
        $royalBook->setLore(["§a§l⊰ §cMua Nó Tại /buycmd để nhận các vật phẩm tại thẻ này"]);

        $menu->getInventory()->setItem(0, $normalBook);
        $menu->getInventory()->setItem(1, ItemFactory::getInstance()->get(160, 5, 1));
        $menu->getInventory()->setItem(10, ItemFactory::getInstance()->get(160, 5, 1));
        $menu->getInventory()->setItem(27, $royalBook);
        $menu->getInventory()->setItem(28, ItemFactory::getInstance()->get(160, 4, 1));
        $menu->getInventory()->setItem(37, ItemFactory::getInstance()->get(160, 4, 1));

        $menu->getInventory()->setItem(45, ItemFactory::getInstance()->get(339, 0, 1)->setCustomName("§rLeft"));
        $menu->getInventory()->setItem(53, ItemFactory::getInstance()->get(339, 0, 1)->setCustomName("§rRight"));

        $menu->getInventory()->setItem(18, ItemFactory::getInstance()->get(399, 0, 1));
        $menu->getInventory()->setItem(19, ItemFactory::getInstance()->get(399, 0, 1));
        $this->menu = $menu;
    }
}