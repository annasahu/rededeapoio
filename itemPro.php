<?php
class ItemPro {
	
    private int $idItemPro;
	private string $nomeItemPro;
    private int $quantItemPro;	

    public function __construct(int $idItemPro, string $nomeItemPro) {
        $this->idItemPro = $idItemPro;
        $this->nomeItemPro = $nomeItemPro;            
    }

    public function getId() : int {
        return $this->idItemPro;
    }
    public function getNome() : string {
        return $this->nomeItemPro;
    }
    public function setQuant(int $quantItemPro) {
        $this->quantItemPro = $quantItemPro;
    }
    public function getQuant() : int {
        return $this->quantItemPro;
    }
    public function maisQuant() : int {
        return $this->quantItemPro + 1;
    }
    public function menosQuant() : int {
        if($this->quantItemPro > 0) {
            return $this->quantItemPro - 1;
        }        
    }
}
?>
