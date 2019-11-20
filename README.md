# Sberbank Profile

## Requirements

1. PHP >= 7.1
2. Nginx
3. MySQL database (e.g. MariaDB)

## How to install

1. Run `make project` to install all requirements

2. Change `.env` file:
    ```
    APP_ENV=prod
    APP_DEBUG=false
    APP_SECRET=<random string>
    DATABASE_URL=<url to database>
    ```

4. Run `make deploy` to make migrations

5. Example [nginx config](docker/default.conf)
