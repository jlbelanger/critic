# Critic

Critic is a movie/TV/music review site. [View the site](https://critic.jennybelanger.com/).

## Development

### Requirements

- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)
- [Yarn](https://classic.yarnpkg.com/en/docs/install)
- Database
- Web server with PHP

### Setup

``` bash
# Clone the repo
git clone https://github.com/jlbelanger/critic.git
cd critic

# Configure the environment settings
cp .env.example .env

# Install dependencies
composer install
yarn install

# Generate key
php artisan key:generate

# Run database migrations
php artisan migrate

# Set permissions
chown -R www-data:www-data storage

# Create account with username "test" and password "password" (or reset existing account password to "password")
php artisan auth:reset-admin
```

### Run

``` bash
yarn start
```

Your browser should automatically open https://localhost:3000/

### Lint

``` bash
./vendor/bin/phpcs
yarn lint
```

### Test

``` bash
./vendor/bin/phpunit
```

## Deployment

Essentially, to set up the repo on the server:

``` bash
git clone https://github.com/jlbelanger/critic.git
cd critic
cp .env.example .env
# Then configure the values in .env.
composer install
php artisan key:generate
php artisan migrate
chown -R www-data:www-data storage
```

For subsequent deploys, push changes to the main branch, then run the following on the server:

``` bash
cd critic
git fetch origin
git pull
composer install
php artisan config:clear
```

### Deploy script

Note: The deploy script included in this repo depends on other scripts that only exist in my private repos. If you want to deploy this repo, you'll have to create your own script.

``` bash
./deploy.sh
```
