# Sberbank Profile

## Requirements

1. PHP >= 7.1.3
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

3. Run `make deploy` to make migrations

4. Example [nginx config](docker/default.conf)

5. Fix bug in Symfony project
    * Open file `vendor/sonata-project/admin-bundle/src/Action/AppendFormFieldElementAction.php`
    * In line 58 change `$code = $request->get('code');` to `$code = $request->get('?code');`
    
6. Last dump of Data Base in `dumps/last.sql`
