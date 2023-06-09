# Cron Job Onfly
The [ali00h/cronjob_without_volume](https://hub.docker.com/r/ali00h/cronjob_without_volume) Docker image can be used as a cronjob
that you can schedule one or more urls calling without mounting any volumes and only using ENV.

## Environment Variables
```
CRON_TIME_ZONE=UTC
CRON_URL_LIST=0 1 * * * https://example-files.online-convert.com/document/txt/example.txt
```
| ENV | Description |
| --- | --- |
| `CRON_TIME_ZONE` | Your time zone for creating backup file name. |
| `CRON_URL_LIST` | You can define **cronjob** for fetching one or more urls. You can define multiple **cronjob** by `,` |

## Usage
If you want to schedule one or more URL calls, you can define them in `CRON_URL_LIST` variable in Environment Variables. For example:
```
30 1 * * * https://example-files.online-convert.com/document/txt/example.txt
```
that's mean everyday At 01:30, that url will be called. 
```
30 1 * * * https://example-files.online-convert.com/document/txt/example.txt,0 13 2 1 * https://www.w3.org/TR/2003/REC-PNG-20031110/iso_8859-1.txt
```
that's mean everyday At 01:30, the first url will be called. and At 13:00 on day-of-month 2 in January, the second url will be called.

_Note: After changing ENV you should restart your docker container._

If you want to see last job logs, login to container console and use this:
```
tail -f /var/log/cron.log
```

## Docker
Just run:
```
docker run -d \
  --env CRON_TIME_ZONE="UTC" \
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
      - CRON_TIME_ZONE=UTC
      - CRON_URL_LIST=* * * * * https://example-files.online-convert.com/document/txt/example.txt
```
and run:
```
docker-compose up -d
```