## About NGC - Wall

### How to start

```bash
# dev
docker-compose -f docker-compose.yml -f docker-compose.dev.yml up -d

# prod
touch acme.json
chmod 600 acme.json
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
```

### How to build

```bash
# composer
docker-compose exec app composer up
# assets
docker-compose exec app yarn install
docker-compose exec app yarn run dev
```

### Run cron from host

```bash
echo "* * * * * cd $PWD && /usr/local/bin/docker-compose exec -T app php artisan schedule:run >> /dev/null 2>&1" | crontab -
```
