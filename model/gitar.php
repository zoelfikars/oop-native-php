<?php

class Gitar
{
    private $nama;
    private $kayu;
    private $senar;

    public function __construct($nama, $kayu, $senar)
    {
        $this->nama = $nama;
        $this->kayu = $kayu;
        $this->senar = $senar;
    }

    public function getName()
    {
        return $this->nama;
    }

    public function getWood()
    {
        return $this->kayu;
    }

    public function getString()
    {
        return $this->senar;
    }
}

class GitarListrik extends Gitar
{
    private $id;
    private $harga;
    private $merek;

    public function __construct($nama, $kayu, $senar, $harga, $merek, $id)
    {
        parent::__construct($nama, $kayu, $senar);
        $this->harga = $harga;
        $this->merek = $merek;
        $this->id = $id;
    }

    public function getPrice()
    {
        return $this->harga;
    }

    public function getBrand()
    {
        return $this->merek;
    }
    public function getID()
    {
        return $this->id;
    }
}
