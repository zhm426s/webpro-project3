# Project 3: Fifteen

Fifteen is a web-based game in which the player must organize 15 tiles contained in a 4 by 4 grid into ascending order. 


## Features

- A game page with 3 immersive themes, and ability to enter a name for saving scores. 
- A game board, with interactive tiles that switch with each other to reorganize. 
- A leaderboard, which gets scores from the scores database and outputs them in a table. 

## Installation

You will need a server capable of running PHP code to run this project, as well as access to a MySQL server on that server. For setting these up, follow instructions in the manuals for your server. 

To ensure MySQL functionality, you will need to create an additional file called "db_userpass.php". The contents for this file should be as follows: 

```
<?php

$user = ""; // add your MySQL username
$pass = ""; // add your MySQL password
$db = ""; // add the name of your desired MySQL database 
```

Upload this file along with all other files to your server. Access the URL for index.php (may depend on your server's file setup) to access the application. 

## Usage

To play the game, you may start with inputting a name and selecting a mode. You begin the game by clicking on "Start Game". The tiles in the grid below should shuffle. 

To play, click on two tiles to swap them. This counts as one move. Attempt to swap pairs of tiles such that the layout of the tiles is as follows: 

```
1   2   3   4
5   6   7   8
9   10  11  12
13  14  15
```

Then, navigate to the leaderboard page to see your score ranked among all others. 

## Future

This project is currently unfinished at turn in time and will likely not be finished. 

## Authors and Acknowledgement

This project was programed by GitHub users azgai and zshm426s. 

Images for tiles are from [Pixabay](pixabay.com).

Generative AI was used for advice and guidance in some areas of development for this project, specifically puzzle logic and some aspects of the PHP API. 