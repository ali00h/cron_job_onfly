# Cron Job Onfly
The [ali00h/cronjob_without_volume](https://hub.docker.com/r/ali00h/cronjob_without_volume) Docker image can be used as a cronjob
that you can schedule one or more cronjob without mounting any volumes and only using ENV.

## Environment Variables
```
TZ=UTC
LOG_MAX_LINE_COUNT=1000
CRON_LIST=0 1 * * * wget "https://example-files.online-convert.com/document/txt/example.txt"
LOGIN_USERNAME=admin
LOGIN_PASSWORD=admin
```
| ENV | Description |
| --- | --- |
| `TZ` | Your time zone |
| `LOG_MAX_LINE_COUNT` | Each log file has a maximum of this number of lines. This is to avoid taking up too much disk space. |
| `CRON_LIST` | You can define **cronjob** for one or more jobs. You can define multiple **cronjob** by `,` |
| `LOGIN_USERNAME` | Login username |
| `LOGIN_PASSWORD` | Login password |

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

### Web interface
You can see cronjob logs report in web interface by open this url:
```
https://yourdomain.com/login
```
The username and password would be set in ENV.

In dashbord you can see the list of cronjobs and by clicking each one, you can see datetime of job events and response of them.

## Docker
Just run:
```
docker run -d -p 8099:80 \
  --env TZ="UTC" \
  --env LOG_MAX_LINE_COUNT="1000" \
  --env CRON_LIST="0 1 * * * wget https://example-files.online-convert.com/document/txt/example.txt" \  
  --env LOGIN_USERNAME="admin" \
  --env LOGIN_PASSWORD="admin" \    
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
    ports:
      - "8099:80"    
    environment:
      - TZ=UTC
      - LOG_MAX_LINE_COUNT=1000      
      - CRON_LIST=* * * * * wget https://example-files.online-convert.com/document/txt/example.txt
      - LOGIN_USERNAME=admin
      - LOGIN_PASSWORD=admin         
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
    ports:
      - "8099:80"    
    environment:
      - TZ=UTC
      - LOG_MAX_LINE_COUNT=1000      
      - CRON_LIST=* * * * * wget https://example-files.online-convert.com/document/txt/example.txt
      - LOGIN_USERNAME=admin
      - LOGIN_PASSWORD=admin  
    volumes:
      - ./cronlog/:/var/log/cronlog/            
```
