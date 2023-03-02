# Notes / Guide (https://www.twilio.com/blog/create-php-websocket-server-build-real-time-even-driven-application)

### Prereq.
- PHP 7+ installed locally
- Composer for storing our application dependencies
- ngrok for creating a tunnel to our client-side application

### Guide:
1. Setup composer
    - Check composer.json
2. Run composer install on root directory of project
    ``` composer install ```
3. Create the WebSocket Class
    - Inside app/socket.php
4. Create the HTTP server
    - Inside app.php
5. Create the Client Application
    - Inside index.html
6. Test the WebSocket Server