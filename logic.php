<?php 

    class Data {
    public $member;
    public $jenis;
    public $waktu;
    public $diskon;
    protected $pajak;
    private $Beat, $Vario, $Aerox, $Scoopy,
    $listMember = ['udin', 'edo', 'alex', 'iwan'];

function __construct(){
    $this->pajak = 10000;
}

public function getMember(){
    if(in_array($this->member, $this->listMember)){
        return "member";
    }else{
        return "non member";
    }
}

public function setHarga($jenis1,$jenis2,$jenis3,$jenis4) {
    $this->Beat = $jenis1;
    $this->Vario = $jenis2;
    $this->Aerox = $jenis3;
    $this->Scoopy = $jenis4;
}

    public function getHarga()
    {
        $data["Beat"] = $this->Beat;
        $data["Vario"] = $this->Vario;
        $data["Aerox"] = $this->Aerox;
        $data["Scoopy"] = $this->Scoopy;
        return $data;
    }
}

class Rental extends Data {
    public function hargaRental(){
        $dataHarga = $this->getHarga()[$this->jenis];
        $diskon = $this->getMember() == "member" ? 5 : 0;
            if($this->waktu === 1) {
                $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
            } else{
                $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100)) + $this->pajak;
            }
            return [$bayar, $diskon];
    }
public function Pembayaran(){
    echo "<center>";
    echo $this->member . " Berstatus Sebagai " . $this->getMember(). " Mendapatkan diskon Sebesar " . $this->hargaRental()[1] . "%";
    echo "<br />";
    echo " jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari ";
    echo "<br />";
    echo " harga rental per harinya : RP. " . number_format($this->getHarga()[$this->jenis], 0, '', '.');
    echo "<br />";
    echo "<br />";
    echo " Besar yang harus dibayarkan adalah RP. " . number_format($this->hargaRental()[0], 0, '', '.');
    }
}
?>
