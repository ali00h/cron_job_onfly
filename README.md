# Cron Job Onfly
The [ali00h/cronjob_without_volume](https://hub.docker.com/r/ali00h/cronjob_without_volume) Docker image can be used as a cronjob
that you can schedule one or more cronjob without mounting any volumes and only using ENV.

## Environment Variables
```
TZ=UTC
CRON_LIST=0 1 * * * wget "https://example-files.online-convert.com/document/txt/example.txt"
```
| ENV | Description |
| --- | --- |
| `TZ` | Your time zone |
| `CRON_LIST` | You can define **cronjob** for one or more jobs. You can define multiple **cronjob** by `,` |

## Usage
If you want to schedule one or more jobs, you can define them in `CRON_LIST` variable in Environment Variables. For example:
```
30 1 * * * wget https://example-files.online-convert.com/document/txt/example.txt
```
that's mean everyday At 01:30, that url will be called. 
```
30 1 * * * wget https://example-files.online-convert.com/document/txt/example.txt,0 13 2 1 * wget https://www.w3.org/TR/2003/REC-PNG-20031110/iso_8859-1.txt
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
  --env TZ="UTC" \
  --env CRON_LIST="0 1 * * * wget https://example-files.online-convert.com/document/txt/example.txt" \
  ali00h/cronjob_without_volume:latest
```

## Docker Compose
Create `docker-compose.yml` with this content:
```
version: "3"
services:
  cronjob:
    image: "ali00h/cronjob_without_volume"
    container_name: cronjob-without-volume
    restart: always
    environment:
      - TZ=UTC
      - CRON_LIST=* * * * * wget https://example-files.online-convert.com/document/txt/example.txt
```
and run:
```
docker-compose up -d
```

check cron job:
```
crontab -l
```
## Docker Compose For Permanent Logs
If you want to keep logs after container restart, you can use volume for log directory. for example `docker-compose.yml` would be:
```
version: "3"
services:
  cronjob:
    image: "ali00h/cronjob_without_volume"
    container_name: cronjob-without-volume
    restart: always
    environment:
      - TZ=UTC
      - CRON_LIST=* * * * * wget https://example-files.online-convert.com/document/txt/example.txt
    volumes:
      - ./cronlog/:/var/log/cronlog/            
```
