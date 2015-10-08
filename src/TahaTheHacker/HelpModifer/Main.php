<?php

namespace TahaTheHacker\HelpModifer;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info("§l§cHelp§6Modifer §aEnabled§c!");
	}
		
    
	public function onCmd(PlayerCommandPreprocessEvent $event){
	$yml = yaml_parse(file_get_contents($this->getDataFolder() . "config.yml"));
	$cmd = explode(" ", $event->getMessage());
        $player = $event->getPlayer();
        
		if(strtolower($cmd[0]) === "/help" || strtolower($cmd[0]) === "/?"){
			
			$event->setCancelled(true);
			foreach($yml["messages"] as $msg){
              	$player->sendMessage(str_replace("{player}", $player->getName(), $msg);
			}
		}
	}
    }/*Main*/
