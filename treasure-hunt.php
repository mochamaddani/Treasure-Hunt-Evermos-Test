<?php

class TreasureHunt 
{
    public function run($treasure_row, $treasure_col, $fake_treasure_row, $fake_treasure_col, $player_row = 4, $player_col = 1)
    {
        $grids = array(
            array('#','#','#','#','#','#','#','#'),
            array('#','.','.','.','.','.','.','#'),
            array('#','.','#','#','#','.','.','#'),
            array('#','.','.','.','#','.','#','#'),
            array('#','.','#','.','.','.','.','#'),
            array('#','#','#','#','#','#','#','#'),
        );
        $row = count($grids);
        $col = count($grids[0]);

        

        // set treasure
        if($grids[$treasure_row][$treasure_col] == '#' || $grids[$fake_treasure_row][$fake_treasure_col] == '#'){ // If treasure point not in clear point, then regenerate
            $new_treasure_row = rand(0, 5);
            $new_treasure_col = rand(0, 7);
            $new_fake_treasure_row = rand(0, 5);
            $new_fake_treasure_col = rand(0, 7);

            $this->run($new_treasure_row, $new_treasure_col, $new_fake_treasure_row, $new_fake_treasure_col, $player_row, $player_col);
            return;
        }
        $grids[$treasure_row][$treasure_col] = '$';
        $grids[$fake_treasure_row][$fake_treasure_col] = '$';

        // set player
        $grids[$player_row][$player_col] = 'X';

        if(($player_row == $treasure_row) && ($player_col == $treasure_col)){ //If treasure found, end game, and show treasure point
            echo "Selamat, harta karun ditemukan!!!, harta karun ada di titik(kolom=".($treasure_col+1)." dan baris=".($treasure_row+1).")\n";
            return;
        }

        // Render grids
        for ($i=0; $i < $row; $i++) { 
            for ($j=0; $j < $col; $j++) { 
                echo $grids[$i][$j];
            }
            echo "\n";
        }

        // User Input
        echo 'Masukan Navigasi => A(UP), B(RIGHT), C(DOWN): ';
        $input = trim(fgets(STDIN));

        switch ($input) {
            case 'A': // (Navigate UP)
                $player_row = $player_row-1;
                if($grids[$player_row][$player_col] == '#'){
                    $player_row = $player_row+1;
                }
                break;
            case 'B': // (Navigate RIGHT)
                $player_col = $player_col+1;
                if($grids[$player_row][$player_col] == '#'){
                    $player_col = $player_col-1;
                }
                break;
            case 'C': // (Navigate DOWN)
                $player_row = $player_row+1;
                if($grids[$player_row][$player_col] == '#'){
                    $player_row = $player_row-1;
                }
                break;
            
            default:
                break;
        }

        $this->run($treasure_row, $treasure_col, $fake_treasure_row, $fake_treasure_col, $player_row, $player_col);
    }
}

$treasure_hunt = new TreasureHunt();
$treasure_row = rand(0, 5);
$treasure_col = rand(0, 7);
$fake_treasure_row = rand(0, 5);
$fake_treasure_col = rand(0, 7);
$treasure_hunt->run($treasure_row, $treasure_col, $fake_treasure_row, $fake_treasure_col);