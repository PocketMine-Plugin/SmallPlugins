<?php

namespace NickName;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as NC;

class NickName extends PluginBase
{

    public $prefix = NC::GRAY . "» " . NC::AQUA . "NickSystem" . NC::GRAY . " » ";

    public function onEnable(): void
    {
        $this->getLogger()->info("NickCommand has been enabled");
    }

    public function onDisable(): void
        

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "nickname":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("nickcommand.nick")) {
                        if (!empty($args[0])) {
                            $sender->sendMessage($this->prefix . "Your nickname has been set to: " . NC::GREEN . implode(" ", $args) . NC::GRAY . "!");
                            $sender->setDisplayName(implode(" ", $args));
                        } else {
                            $sender->sendMessage($this->prefix . NC::RED . "Please specify an nickname");
                        }
                    } else {
                        $sender->sendMessage($this->prefix . NC::RED . "You do not have permission to use this command");
                    }
                } else {
                    $sender->sendMessage($this->prefix . NC::RED . "Please use this command in-game");
                }
                return true;
            case "nick":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("nickcommand.nick")) {
                        if (!empty($args[0])) {
                            $sender->sendMessage($this->prefix . "Your nickname has been set to: " . NC::GREEN . implode(" ", $args) . NC::GRAY . "!");
                            $sender->setDisplayName(implode(" ", $args));
                        } else {
                            $sender->sendMessage($this->prefix . NC::RED . "Please specify an nickname");
                        }
                    } else {
                        $sender->sendMessage($this->prefix . NC::RED . "You do not have permission to use this command");
                    }
                } else {
                    $sender->sendMessage($this->prefix . NC::RED . "Please use this command in-game");
                }
                return true;
        }
        return false;
    }
}
