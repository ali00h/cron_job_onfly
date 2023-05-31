# Cron Job Onfly


## Environment Variables
```
TIME_ZONE=America/LosAngeles
CRON_URL_LIST=0 1 * * * https://example-files.online-convert.com/document/txt/example.txt
```
| ENV | Description |
| --- | --- |
| `TIME_ZONE` | Your time zone for creating backup file name. |
| `CRON_URL_LIST` | **(Optional)** If this variable is not empty, you can define **cronjob** for fetching a url. You can define multiple **cronjob** by `,` |

### Cron Job
If you want to schedule one or more URL calls, you can define them in `CRON_URL_LIST` variable in Environment Variables. For example:
```
30 1 * * * https://example-files.online-convert.com/document/txt/example.txt
```
that's mean everyday At 01:30, that url will be called. 

If you want to see last job logs, login to container console and use this:
```
tail -f /var/www/html/log/cron_last_log.inc
```
