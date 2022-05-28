<?php


class Universe{

    protected int $height;
    protected int $width;
    public array $universe;

    public function __construct($height,$width)
    {
        $this->height = $height;
        $this->width = $width;
        $this->universe = [];

    }
    // create the universe as an 2D array
    public function createBlankUniverse(){
        for($i = 0; $i < $this->height; $i++){
            $this->universe[] = [];
            for($x = 0; $x < $this->width; $x++){
                $this->universe[$i][] = 0;
            }
        }
        return $this->universe;
    }

    public function createHtmlUniverse(){
        $count = 0;
        foreach ($this->universe as $cell){
           $count += 1;
        }
        erl($count);
        return $count;
    }

}
