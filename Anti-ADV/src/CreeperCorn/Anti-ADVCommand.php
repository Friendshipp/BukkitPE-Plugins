<?php

namespace CreeperCorn\Anti-ADV;

use BukkitPE\Server;
use BukkitPE\plugin\PluginBase;
use BukkitPE\Player;
use BukkitPE\command\Command;
use BukkitPE\command\CommandSender;
use BukkitPE\command\CommandExecutor;
use BukkitPE\utils\TextFormat as TF;

class Anti-ADVCommand extends PluginBase implements CommandExecutor{

    public function __construct(Anti-ADV $plugin){
        $this->plugin = $plugin;
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        switch(strtolower($cmd->getName())){
            case "na":
                if($sender->hasPermission("anti.adv")) {
                    if (isset($args[0])) {
                        switch ($args[0]) {
                            case "add":
                                if(isset($args[1])){
                                    return $this->plugin->addDomain($sender, $args[1]);
                                }
                                else{
                                    return false;
                                }
                                break;
                            case "remove":
                                if(isset($args[1])){
                                    return $this->plugin->removeDomain($sender, $args[1]);
                                }
                                else{
                                    return false;
                                }
                                break;
                            case "list":
                                return $this->plugin->listDomain($sender);
                                break;
                        }
                    }
                    else{
                        return false;
                    }
                }
                else{
                    $sender->sendMessage(TF::RED . "You do not have permission");
                    return true;
                }
                break;
        }
    }

}
