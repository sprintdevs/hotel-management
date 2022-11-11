# This guide is only targeted for containerized project run

## Prerequisite(s)
-   For macOS/Windows, install `Docker Desktop`
-   For Linux, install `docker` and `docker-compose`

### Get the project
-   `git clone git@github.com:sprintdevs/hotel-management.git`
-   `cd hotel-management`
-   `cp .env.example .env` (change values if you have to)

### Configure docker for non-root user
*Run below commands and set respective .env values from the output*
-   `echo USER=$(whoami)`
-   `echo UID=$(id -u)`
-   `echo GID=$(id -g)`

### Initial project build and run
-   `docker-compose up --build --detach`
-   `alias dcr="docker-compose run --rm --service-ports"`
-   `dcr composer install`
-   `dcr artisan key:generate` only if .env is copied from .env.example
-   `dcr artisan migrate:fresh --seed` runs migration along with DB seeders
-   `dcr artisan l5:generate`
-   `dcr npm install`
-   `dcr npm run dev`
-   `http://localhost:<NGINX_PORT>` visit from browser
    <br><br>

### Subsequent project run
-   `docker-compose up -d`
-   `dcr npm run dev`
-   `http://localhost:<NGINX_PORT>` visit from browser
    <br><br>

### To shut down the project
-   `docker-compose down`

## Helper Commands

### To easily use artisan/composer/npm commands, add this alias in .bashrc or .zshrc
`alias dcr="docker-compose run --rm --service-ports"`

### To run artisan inside docker
`dcr artisan <command_here>`

### To run composer inside docker
`dcr composer <command_here>`

### To run npm inside docker
`dcr npm <command_here>`
