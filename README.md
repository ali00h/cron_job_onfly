# Cron Job Onfly
The [ali00h/cronjob_without_volume](https://hub.docker.com/r/ali00h/cronjob_without_volume) Docker image can be used as a cronjob
that you can schedule one or more urls calling without mounting any volumes and only using ENV.

## Environment Variables
```
TIME_ZONE=UTC
CRON_URL_LIST=0 1 * * * https://example-files.online-convert.com/document/txt/example.txt
```
| ENV | Description |
| --- | --- |
| `TIME_ZONE` | Your time zone for creating backup file name. |
| `CRON_URL_LIST` | **(Optional)** If this variable is not empty, you can define **cronjob** for fetching a url. You can define multiple **cronjob** by `,` |

## Usage
If you want to schedule one or more URL calls, you can define them in `CRON_URL_LIST` variable in Environment Variables. For example:
```
30 1 * * * https://example-files.online-convert.com/document/txt/example.txt
```
that's mean everyday At 01:30, that url will be called. 

If you want to see last job logs, login to container console and use this:
```
tail -f /var/log/cron.log
```

## Docker
Just run:
```
docker run -d \
  --env TIME_ZONE="UTC" \
  --env CRON_URL_LIST="0 1 * * * https://example-files.online-convert.com/document/txt/example.txt" \
  ali00h/cronjob_without_volume:latest
```

## Docker Compose
Create docker-compose.yml with this content:
```
version: "3"
services:
  cronjob:
    image: "ali00h/cronjob_without_volume"
    container_name: cronjob-without-volume
    restart: always
    environment:
      - TIME_ZONE=UTC
      - CRON_URL_LIST=* * * * * https://example-files.online-convert.com/document/txt/example.txt
```
and run:
```
docker-compose up -d
```