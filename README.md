# Chat BGPRO CMS

## After clone make this steps:

```bash
1)composer install or composer update
2)npm install
3)clone .env.example as .env
4)php artisan key:generate
5)php artisan migrate
6)change in .env file APP_URL=your_site_url(important!!!)

If you work on local!!!
1)run redis (this directory redis-64/redis-server.exe )
2)npm install -g laravel-echo-server
3)laravel-echo-server start
4)php artisan queue:work

If you work on server!!!
1)sudo apt-get install redis-server
2)chek redis is-running (sudo service redis-server status)
3)npm install -g laravel-echo-server
4)sudo apt-get install supervisor
5)upload file (this directory) queue-echo-server.conf to /etc/supervisor/conf.d/
6)in queue-echo-server.conf change path of command (6,16 line) to your project path
7)in queue-echo-server.conf change path of stdout_logfile (12,22 line) to your project path
8)sudo supervisorctl reread
9)sudo supervisorctl update
10)sudo supervisorctl start workers:*

If the server already uses this technology on a another website!!!
1)change port of laravel-echo-server in (laravel-echo-server.json and bootstrap.js)
2)change prefix of redis in (.env and laravel-echo-server.json)
3)restart laravel-echo-server

```

## Excel
How to work with Excel(https://docs.laravel-excel.com/3.1/getting-started/)

