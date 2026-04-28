<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Fifteen</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Fifteen</h1>
        </header>
        <main>
            <form id="name-form" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Name Here">
                <button type="submit">Enter Name</button>
            </form>
            <form id="mode-form"> <!--this value might have to be handled by javascript-->
                <label for="mode">Name</label>
                <select id="mode" name="mode">
                    <option value="bloom" selected>Bloom</option>
                    <option value="breeze">Breeze</option>
                    <option value="sun">Sun</option>
                </select>
                <button type="submit">Enter Name</button>
            </form>
            <button type="button">Start Game</button> <!--attach this to a script for beginning the game-->
            <div id="game-board"> <!-- pieces may have to be loaded dynamically, pos-# classes are for where in the board they sit-->
                <div class="board-piece pos-1 bloom" id="1">1</div>
                <div class="board-piece pos-2 bloom" id="2">2</div>
                <div class="board-piece pos-3 bloom" id="3">3</div>
                <div class="board-piece pos-4 bloom" id="4">4</div>
                <div class="board-piece pos-5 bloom" id="5">5</div>
                <div class="board-piece pos-6 bloom" id="6">6</div>
                <div class="board-piece pos-7 bloom" id="7">7</div>
                <div class="board-piece pos-8 bloom" id="8">8</div>
                <div class="board-piece pos-9 bloom" id="9">9</div>
                <div class="board-piece pos-10 bloom" id="10">10</div>
                <div class="board-piece pos-11 bloom" id="11">11</div>
                <div class="board-piece pos-12 bloom" id="12">12</div>
                <div class="board-piece pos-13 bloom" id="13">13</div>
                <div class="board-piece pos-14 bloom" id="14">14</div>
                <div class="board-piece pos-15 bloom" id="15">15</div>
            </div>
            <div id="stats">
                <div id="timer-div"><p id="timer"><!--put timer var in contents of #timer--></p></div>
                <div id="moves-div"><p id="moves"><!--put moves var in contents of #moves--></p></div>
            </div>
        </main>
    </body>
</html>
