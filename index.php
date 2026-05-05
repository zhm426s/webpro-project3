<?php
include_once "db_api.php";

// get name and start session
session_start();
if (isset($_POST['name']) && $_POST['name'] !== '') {
    $name = htmlspecialchars($_POST['name']);
    $id = insert_user($name);
    $_SESSION['this_game'] = $id;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    if ($_POST['action'] === 'game_complete') {

        $moves = intval($_POST['moves']);
        $time = intval($_POST['time']);
        $mode = htmlspecialchars($_POST['mode']);

        $user_id = $_SESSION['this_game'] ?? null;

        if ($user_id) {
            save_score($user_id, $mode, $moves, $time);
        }

        exit;
    }
}

// TODO in a separate file: game logic, including how game ends
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fifteen</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bloom">
    <header>
        <h1>Fifteen</h1>
        <button onClick="location.href='leaderboard.php';">View Leaderboard</button>
    </header>
    <main>
        <form id="name-form" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name Here">
            <button type="submit">Enter Name</button>
        </form>
        <form id="mode-form"> <!--this value might have to be handled by javascript-->
            <label for="mode">Mode</label>
            <select id="mode" name="mode">
                <option value="bloom" selected>Bloom</option>
                <option value="breeze">Breeze</option>
                <option value="sun">Sun</option>
            </select>
            <button type="submit">Enter Name</button>
        </form>
        <button type="button" onclick="startGame()">Start Game</button>
        <div id="board-center">
            <div id="game-board"> <!-- pieces may have to be loaded dynamically, pos-# classes are for where in the board they sit-->
                <div class="board-piece pos-1 bloom" id="1">
                    <p>1</p>
                </div>
                <div class="board-piece pos-2 bloom" id="2">
                    <p>2</p>
                </div>
                <div class="board-piece pos-3 bloom" id="3">
                    <p>3</p>
                </div>
                <div class="board-piece pos-4 bloom" id="4">
                    <p>4</p>
                </div>
                <div class="board-piece pos-5 bloom" id="5">
                    <p>5</p>
                </div>
                <div class="board-piece pos-6 bloom" id="6">
                    <p>6</p>
                </div>
                <div class="board-piece pos-7 bloom" id="7">
                    <p>7</p>
                </div>
                <div class="board-piece pos-8 bloom" id="8">
                    <p>8</p>
                </div>
                <div class="board-piece pos-9 bloom" id="9">
                    <p>9</p>
                </div>
                <div class="board-piece pos-10 bloom" id="10">
                    <p>10</p>
                </div>
                <div class="board-piece pos-11 bloom" id="11">
                    <p>11</p>
                </div>
                <div class="board-piece pos-12 bloom" id="12">
                    <p>12</p>
                </div>
                <div class="board-piece pos-13 bloom" id="13">
                    <p>13</p>
                </div>
                <div class="board-piece pos-14 bloom" id="14">
                    <p>14</p>
                </div>
                <div class="board-piece pos-15 bloom" id="15">
                    <p>15</p>
                </div>
            </div>
        </div>
        <div id="stats">
            <div id="timer-div">
                <p><b>Time: </b></p>
                <p><span id="timer">0</span></p>
            </div>
            <div id="moves-div">
                <p><b>Number of Moves: </b></p>
                <p><span id="moves">0</span></p>
            </div>
        </div>
    </main>
</body>

</html>
<script src="js/puzzle.js"></script>