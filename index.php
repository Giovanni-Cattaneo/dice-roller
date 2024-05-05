<?php

$dice = $_POST["dice"];

$dices = !empty($_POST["dices"]) ? $_POST["dices"] : 1;

$char = $_POST["char"];

$proficency = !empty($_POST["proficency"]) ? $_POST["proficency"] : 0;

$weapon_mod = !empty($_POST["weapon_mod"]) ? $_POST["weapon_mod"] : 0;

$mod = !empty($_POST["mod"]) ? $_POST["mod"] : 0;

// switch ($char) {
//     case "0":
//         $mod = 0;
//         break;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: antiquewhite;
        }

        header {
            background-color: lightblue;
        }

        table {
            display: inline;
            margin: 1rem;

            & td {
                border: 1px solid;
                width: 120px;
            }

        }

        .mod,
        .proficency {
            position: absolute;
        }

        .mod {
            left: 1rem;
            top: 10rem;
        }

        .proficency {
            left: 1rem;
            top: 35rem;
        }

        .total {
            font-size: 2rem;
            border-top: 1px solid;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <header class="p-4">
        <h1>
            Welcome to Dice roller
        </h1>
    </header>

    <main class="m-5 d-flex flex-column text-center gap-5 align-items-center">
        <form class="d-flex flex-column gap-3 align-items-center" action="index.php" method="post">
            <div>
                <label for="">Seleziona il dado</label>
                <select name="dice" id="">
                    <option value="0"></option>
                    <option value="2">Coin</option>
                    <option value="4">d4</option>
                    <option value="6">d6</option>
                    <option value="8">d8</option>
                    <option value="10">d10</option>
                    <option value="20">d20</option>
                    <option value="100">d100</option>
                </select> <br>
            </div>

            <div>
                <label for="">Scegli se lanciare piu dadi</label>
                <select name="dices">
                    <option value="1"></option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
                <br>
            </div>


            <div>
                <label for="">Aggiungi il modificatore caratteristica</label>
                <input type="number" name="mod">
            </div>

            <div>
                <label for="">Aggiungi bonus dell'arma se presente</label>
                <input type="radio" value="1" name="weapon_mod" />+1
                <input type="radio" value="2" name="weapon_mod" />+2
                <input type="radio" value="3" name="weapon_mod" />+3
            </div>

            <div>
                <label for="">Aggiungi il Bonus competenza se sei competente nell'uso dell'arma</label>
                <input type="radio" value="2" name="proficency" />+2
                <input type="radio" value="3" name="proficency" />+3
                <input type="radio" value="4" name="proficency" />+4
                <input type="radio" value="5" name="proficency" />+5
                <input type="radio" value="6" name="proficency" />+6
            </div>
            <input type="submit" value="Result">
        </form>

        <div class="container ">
            <div class="row justify-content-center">
                <?php
                for ($i = 0; $i < $dices; $i++) {
                    if ($dice != 0 && isset($dice)) {
                        $dice_roll = rand(1, $dice);
                        $result = $dice_roll + $mod + $weapon_mod + $proficency;
                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Dice rolled: d<?= $dice ?></h5>
                                    <?php if ($dice_roll === 20) : ?>
                                        <p class="card-text">Result: <span class="green"><?= $dice_roll ?></span></p>
                                    <?php elseif ($dice_roll === 1) : ?>
                                        <p class="card-text">Result: <span class="red"><?= $dice_roll ?></span></p>
                                    <?php else : ?>
                                        <p class="card-text">Result: <span><?= $dice_roll ?></span></p>
                                    <?php endif; ?>
                                    <p class="card-text">Mod: +<?= $mod ?></p>
                                    <p class="card-text">Weapon Mod: +<?= $weapon_mod ?></p>
                                    <p class="card-text">Proficency: +<?= $proficency ?></p>
                                    <?php if ($dice_roll === 20) : ?>
                                        <p class="card-text total ">Total: <span class="green"><?= $result ?></span></p>
                                    <?php elseif ($dice_roll === 1) : ?>
                                        <p class="card-text total ">Total: <span class="red"><?= $result ?></span></p>
                                    <?php else : ?>
                                        <p class="card-text total">Total: <span><?= $result ?></span></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>



        <div class="d-flex">
            <table class="mod">
                <thead>
                    <tr>
                        <th>Statistica</th>
                        <th>Modificatore</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0 - 1</td>
                        <td>-5</td>
                    </tr>
                    <tr>
                        <td>2 - 3</td>
                        <td>-4</td>
                    </tr>
                    <tr>
                        <td>4 - 5</td>
                        <td>-3</td>
                    </tr>
                    <tr>
                        <td>6 - 7</td>
                        <td>-2</td>
                    </tr>
                    <tr>
                        <td>8 - 9</td>
                        <td>-1</td>
                    </tr>
                    <tr>
                        <td>10 - 11</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>12 - 13</td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>14 - 15</td>
                        <td>+2</td>
                    </tr>
                    <tr>
                        <td>16 - 17</td>
                        <td>+3</td>
                    </tr>
                    <tr>
                        <td>18 - 19</td>
                        <td>+4</td>
                    </tr>
                    <tr>
                        <td>20 - 21</td>
                        <td>+5</td>
                    </tr>
                    <tr>
                        <td>22 - 23</td>
                        <td>+6</td>
                    </tr>
                    <tr>
                        <td>24 - 25</td>
                        <td>+7</td>
                    </tr>
                </tbody>
            </table>

            <table class="proficency">
                <tr>
                    <th>Livello</th>
                    <th>Bonus di Competenza</th>
                </tr>
                <!-- Livelli da 1 a 4 -->
                <tr>
                    <td>1-4</td>
                    <td>+2</td>
                </tr>
                <!-- Livelli da 5 a 8 -->
                <tr>
                    <td>5-8</td>
                    <td>+3</td>
                </tr>
                <!-- Livelli da 9 a 12 -->
                <tr>
                    <td>9-12</td>
                    <td>+4</td>
                </tr>
                <!-- Livelli da 13 a 16 -->
                <tr>
                    <td>13-16</td>
                    <td>+5</td>
                </tr>
                <!-- Livelli da 17 a 20 -->
                <tr>
                    <td>17-20</td>
                    <td>+6</td>
                </tr>
            </table>
        </div>


    </main>


</body>

</html>