let board = [];
let emptyIndex = 15;
let moves = 0;
let timer = 0;
let timerInterval;

function startGame() {
    board = [...Array(15).keys()].map(x => x + 1);
    board.push(0);

    moves = 0;
    timer = 0;

    shuffle();
    render();
    updateStats();
}

function shuffle() {
    for (let i = 0; i < 200; i++) {
        let neighbors = getMoves(emptyIndex);
        let rand = neighbors[Math.floor(Math.random() * neighbors.length)];

        swap(emptyIndex, rand);
        emptyIndex = rand;
    }
}

function getMoves(i) {
    let m = [];
    let r = Math.floor(i / 4);
    let c = i % 4;

    if (r > 0) m.push(i - 4);
    if (r < 3) m.push(i + 4);
    if (c > 0) m.push(i - 1);
    if (c < 3) m.push(i + 1);

    return m;
}

function swap(i, j) {
    [board[i], board[j]] = [board[j], board[i]];
}

function render() {
    const boardDiv = document.getElementById("game-board");
    boardDiv.innerHTML = "";

    board.forEach((num, i) => {
        if (num === 0) return;

        const tile = document.createElement("div");
        tile.className = "board-piece";
        tile.textContent = num;

        tile.onclick = () => move(i);

        boardDiv.appendChild(tile);
    });
}

function move(i) {
    if (!getMoves(emptyIndex).includes(i)) return;

    swap(i, emptyIndex);
    emptyIndex = i;

    moves++;
    updateStats();
    render();

    if (moves === 1) startTimer();

    if (checkWin()) finish();
}

function startTimer() {
    timerInterval = setInterval(() => {
        timer++;
        updateStats();
    }, 1000);
}

function updateStats() {
    document.getElementById("moves").textContent = moves;
    document.getElementById("timer").textContent = timer + "s";
}

function checkWin() {
    for (let i = 0; i < 15; i++) {
        if (board[i] !== i + 1) return false;
    }
    return true;
}

function finish() {
    clearInterval(timerInterval);

    fetch("api/save_score.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            name: playerName,
            mode: currentMode,
            moves: moves,
            time: timer
        })
    });

    alert("Solved!");
}