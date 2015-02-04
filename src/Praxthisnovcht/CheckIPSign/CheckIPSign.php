<?php
namespace Praxthisnovcht\CheckIPSign;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Sign;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class CheckIPSign extends PluginBase implements Listener{

	public function onEnable(){
		$this->getLogger()->info(TextFormat::GREEN . "CheckIPSign Enabled");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}		
	public function onSignChange(SignChangeEvent $event){
	$player = $event->getPlayer();
		if(strtolower(trim($event->getLine(0))) == "checkip" || strtolower(trim($event->getLine(0))) == "[IP]"){
			if($player->hasPermission("checkip.commands.sign")){
			        $ip = $player->getAddress();      
                    $name = $player->getDisplayName();  
				$event->setLine(0,"[CheckIP]");
				$event->setLine(1,""$name"Your ip is");
				$event->setLine(2,"[ "$ip" ]");
				$event->setLine(3,"remove the sign after !");
				
				$event->getPlayer()->sendMessage("[CheckIP] After seeing your ip, it is prudent to delete your Sign !");
			}else{
				$player->sendMessage("[CheckIP] You don't have permissions!");
				$event->setLine(0,"[ACESS DENIED]");
				$event->setLine(1,"ACESS DENIED");
				$event->setLine(2,"ACESS DENIED");
				$event->setLine(3,"ACESS DENIED");
				
			}
		}
	}
}