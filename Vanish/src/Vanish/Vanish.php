<?php

namespace Vanish;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\entity\EffectInstance;
use pocketmine\entity\Effect;
use pocketmine\utils\TextFormat as V;

class Vanish extends PluginBase
{

    public $prefix = V::GRAY . "» " . V::AQUA . "Vanish" . V::GRAY . " » ";

    public function onEnable(): void
    {
        $this->getLogger()->info("Vanish was enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "vanish":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("vanish.command")) {
                        if (!empty($args[0])) {
                            if ($args[0] == "on") {
                                $sender->sendMessage($this->prefix . "You are now " . V::GREEN . "Vanished" . V::GRAY . "!");
                                $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::NIGHT_VISION), (99999999*20), (1), (false)));
                                $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), (99999999*20), (1), (false)));
                                return true;
                            }
                            if ($args[0] == "off") {
                                $sender->sendMessage($this->prefix . "You are now " . V::GREEN . "unvanished" . V::GRAY . "!");
                                $sender->removeEffect(Effect::NIGHT_VISION);
                                $sender->removeEffect(Effect::INVISIBILITY);
                                return true;
                            } else {
                                $sender->sendMessage($this->prefix . "Usage: /vanish <on/off>");
                            }
                        }
                        if (empty($args[0])) {
                                $sender->sendMessage($this->prefix . "Usage: /vanish <on/off>");
                        }
                    } else {
                        $sender->sendMessage($this->prefix . V::RED . "You dont have the Permission for this command!");
                    }
                } else {
                    $sender->sendMessage($this->prefix . V::RED . "This command is only for Players!");
                }
                return true;
            case "v":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("vanish.command")) {
                        if (!empty($args[0])) {
                            if ($args[0] == "on") {
                                $sender->sendMessage($this->prefix . "You are now " . V::GREEN . "Vanished" . V::GRAY . "!");
                                $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::NIGHT_VISION), (99999999*20), (1), (false)));
                                $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), (99999999*20), (1), (false)));
                                return true;
                            }
                            if ($args[0] == "off") {
                                $sender->sendMessage($this->prefix . "You are now " . V::GREEN . "unvanished" . V::GRAY . "!");
                                $sender->removeEffect(Effect::NIGHT_VISION);
                                $sender->removeEffect(Effect::INVISIBILITY);
                                return true;
                            } else {
                                $sender->sendMessage($this->prefix . "Usage: /vanish <on/off>");
                            }
                        }
                        if (empty($args[0])) {
                            $sender->sendMessage($this->prefix . "Usage: /vanish <on/off>");
                        }
                    } else {
                        $sender->sendMessage($this->prefix . V::RED . "You dont have the Permission for this command!");
                    }
                } else {
                    $sender->sendMessage($this->prefix . V::RED . "This command is only for Players!");
                }
                return true;
        }
        return false;
    }
}
