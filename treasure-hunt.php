<?php

class TreasureHunt 
{
    public function run($treasure_row, $treasure_col, $fake_treasure_row, $fake_treasure_col, $player_row = 4, $player_col = 1)
    {
        

        $this->run($treasure_row, $treasure_col, $fake_treasure_row, $fake_treasure_col, $player_row, $player_col);
    }
}

$treasure_hunt = new TreasureHunt();
$treasure_row = rand(0, 5);
$treasure_col = rand(0, 7);
$fake_treasure_row = rand(0, 5);
$fake_treasure_col = rand(0, 7);
$treasure_hunt->run($treasure_row, $treasure_col, $fake_treasure_row, $fake_treasure_col);