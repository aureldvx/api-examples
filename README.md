# API examples with Symfony Backend and React/Angular/Vue Frontends

## Start symfony server
```sh
cd api-examples/api/
composer install
php bin/console doctrine:database:create
php bin:console doctrine:migration:migrate
php bin/console doctrine:fixtures:load
php -S 127.0.0.1:8000 -t public
```

You can access to all API endpoints by typing the URL localhost:8000/api/

## Start React app
```sh
cd api-examples/front-react/
yarn install
yarn dev
```

## Start Vue app
```sh
cd api-examples/front-vue/
yarn install
yarn dev
```

## Start Angular app
```sh
cd api-examples/front-angular/
npm install -g @angular/cli
npm install
ng serve
```