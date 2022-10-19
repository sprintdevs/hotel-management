## Prerequisite(s)

-   For macOS/Windows, install docker desktop
-   For Linux, install docker and docker-compose

### Steps to get the project running

-   `git clone git@github.com:sprintdevs/hotel-management.git`
-   `cd hotel-mangement`
-   `cp .env.example .env` (change values if you have to)
-   `docker-compose up --build --detach`
-   `alias dcr="docker-compose run --rm --service-ports"`
-   `dcr composer install`
-   `dcr artisan key:generate` only if .env is copied from .env.example
-   `dcr yarn`
-   `dcr yarn dev`
-   `http://localhost:<NGINX_PORT>` visit from browser
    <br><br>

## Helper Commands

### To easily use artisan/composer/yarn commands, add this alias in .bashrc or .zshrc

`alias dcr="docker-compose run --rm --service-ports"`<br>

### To run artisan inside docker

`dcr artisan <command_here>`

### To run composer inside docker

`dcr composer <command_here>`

### To run yarn inside docker

`dcr yarn <command_here>`

### To shut down the project using docker

`docker-compose down`
