## Installation

- `git clone https://github.com/TemperWorks/segment-debug.git`
- `cd segment-debug`
- `cp .env.example .env`
- Enter your segment key in the .env file `SEGMENT_KEY=A...B`
- `composer install`

## fire test events
To fire 2000 test events. (You can replace 2000 with any number)
`php artisan segment:fireTestEvent 2000`
