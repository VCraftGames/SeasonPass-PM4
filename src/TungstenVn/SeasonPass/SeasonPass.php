<?php

namespace TungstenVn\SeasonPass;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player; 
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\Event;

use TungstenVn\SeasonPass\commands\commands;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;

use jojoe77777\FormAPI\SimpleForm;
class SeasonPass extends PluginBase implements Listener {

    	public $levelApi;
	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        	if(!class_exists(InvMenu::class) || !class_exists(SimpleForm::class)){
        		$this->getServer()->getLogger()->info("\n\n§cSeasonPass > Thiếu Lib InvMenu và FormAPI\n");
            		$this->getServer()->getPluginManager()->disablePlugin($this);
            		return;
        	}
        	$this->levelApi = $this->getServer()->getPluginManager()->getPlugin("MineLevel");
		if(is_null($this->levelApi)){
        		$this->getServer()->getLogger()->info("\n\n§cSeasonPass > Thiếu MineLevel\n");
		}
        	$this->saveDefaultConfig();
        	$cmds = new commands($this);
        	$this->getServer()->getCommandMap()->register("seasonpass", $cmds);
        	$this->getServer()->getPluginManager()->registerEvents($cmds,$this);
        
        	if(!InvMenuHandler::isRegistered()){
            		InvMenuHandler::register($this);
        	}
	}

}
