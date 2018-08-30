<?php

namespace NickName;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as NC;

class NickName extends PluginBase{

    public $prefix = NC::GRAY . "» " . NC::AQUA . "NickSystem" . NC::GRAY . " » ";

    public function onEnable()
    {
        $this->getLogger()->info("NickCommand was loaded!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()){
            case "nickname":
                if($sender instanceof Player) {
                    if($sender->hasPermission("nickcommand.nick")) {
                        if(!empty($args[0])) {
                            $sender->sendMessage($this->prefix . "Your Nickname was set to: " . NC::GREEN . implode(" ", $args) . NC::GRAY . "!");
                            $sender->setDisplayName(implode(" ", $args));
                        }else{
                            $sender->sendMessage($this->prefix . NC::RED . "Please specify an Nickname!");
                        }
                    }else{
                        $sender->sendMessage($this->prefix . NC::RED . "You dont have the Permission to use this Command!");
                    }
                }else{
                    $sender->sendMessage($this->prefix . NC::RED . "This Command is only for Players!");
                }
                return true;

            case "nick":
                if($sender instanceof Player) {
                    if($sender->hasPermission("nickcommand.nick")) {
                        if(!empty($args[0])) {
                            $sender->sendMessage($this->prefix . "Your Nickname was set to: " . NC::GREEN . implode(" ", $args) . NC::GRAY . "!");
                            $sender->setDisplayName(implode(" ", $args));
                        }else{
                            $sender->sendMessage($this->prefix . NC::RED . "Please specify an Nickname!");
                        }
                    }else{
                        $sender->sendMessage($this->prefix . NC::RED . "You dont have the Permission to use this Command!");
                    }
                }else{
                    $sender->sendMessage($this->prefix . NC::RED . "This Command is only for Players!");
                }
                return true;
        }
        return false;
    }
}