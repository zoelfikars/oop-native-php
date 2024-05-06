<?php
class Toko
{
    private $gitar = [];

    public function create(GitarListrik $item)
    {
        $this->gitar[] = $item;
    }
    public function getByID($id)
    {
        foreach ($this->gitar as $key => $item) {
            if ($item instanceof GitarListrik && $item->getID() === $id) {
                return $this->gitar[$key];
            }
        }
        return false;
    }
    public function delete($id)
    {
        foreach ($this->gitar as $key => $item) {
            if ($item instanceof GitarListrik && $item->getID() === $id) {
                unset($this->gitar[$key]);
                return true;
            }
        }
        return false;
    }
    public function getAll()
    {
        return $this->gitar;
    }
}
