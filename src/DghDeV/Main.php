<?php

namespace DghDeV;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener {
    
    public function onEnable(){
        $this->getLogger()->info("§l§aPlugin Enable By DghDeV");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        switch($cmd->getName()){
            case "tfui":
                if($sender instanceof Player){
                    $this->MenuForm($sender);
                    return true;
                }else{
                    $sender->sendMessage("Use this cmd in Game!");
                }
            break;
        }
        return true;
    }
    
    public function MenuForm($sender){ 
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    $this->OneBlockForm($sender);
                break;
                case 1:
                    $this->SkyBlockForm($sender);
                break;
                case 2:
                    $this->SkyTreeForm($sender);
                break;
                case 3:
                    $this->MinigamesForm($sender);
                break;
                case 4:
                    $sender->sendMessage("§cCancelled");
                break;
            }
        });
        $form->setTitle("§lTRANSFERUI");
        $form->setContent("");
        $form->addButton("§lONEBLOCK\n§oTAP TO TELEPORT", 0, "textures/ui/lock");
        $form->addButton("§lSKYBLOCK\n§oTAP TO TELEPORT", 0, "textures/ui/lock");
        $form->addButton("§lSKYTREE\n§oTAP TO TELEPORT", 0, "textures/ui/lock");
        $form->addButton("§lMINIGAMES\n§oTAP TO TELEPORT", 0, "textures/ui/lock");
        $form->addButton("§lBACK", 0, "textures/ui/cancel");
        $form->sendToPlayer($sender);
        return ($form);
    }
    
    public function OneBlockForm($sender){ 
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    $this->getServer()->getCommandMap()->dispatch($sender, "transfer oneblock");
                break;
                case 1:
                    $this->MenuForm($sender);
                break;
            }
        });
        $form->setTitle("§lTRANSFERUI");
        $form->setContent("");
        $form->addButton("§lYES", 0, "textures/ui/confirm");
        $form->addButton("§lNO", 0, "textures/ui/cancel");
        $form->sendToPlayer($sender);
        return ($form);
   }
   
    public function SkyBlockForm($sender){ 
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    $this->getServer()->getCommandMap()->dispatch($sender, "transfer skyblock");
                break;
                case 1:
                    $this->MenuForm($sender);
                break;
            }
        });
        $form->setTitle("§lTRANSFERUI");
        $form->setContent("");
        $form->addButton("§lYES", 0, "textures/ui/confirm");
        $form->addButton("§lNO", 0, "textures/ui/cancel");
        $form->sendToPlayer($sender);
        return ($form);
   }
   
   public function SkyTreeForm($sender){ 
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    $this->getServer()->getCommandMap()->dispatch($sender, "transfer skytree");
                break;
                case 1:
                    $this->MenuForm($sender);
                break;
            }
        });
        $form->setTitle("§lTRANSFERUI");
        $form->setContent("");
        $form->addButton("§lYES", 0, "textures/ui/confirm");
        $form->addButton("§lNO", 0, "textures/ui/cancel");
        $form->sendToPlayer($sender);
        return ($form);
   }
   
   public function MinigamesForm($sender){ 
        $form = new SimpleForm(function (Player $sender, int $data = null) {
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    $this->getServer()->getCommandMap()->dispatch($sender, "transfer minigames");
                break;
                case 1:
                    $this->MenuForm($sender);
                break;
            }
        });
        $form->setTitle("§lTRANSFERUI");
        $form->setContent("");
        $form->addButton("§lYES", 0, "textures/ui/confirm");
        $form->addButton("§lNO", 0, "textures/ui/cancel");
        $form->sendToPlayer($sender);
        return ($form);
   }
}