<h1 align="center">Welcome to clean-architecture-php 👋</h1>
<p>
</p>

> Aplicação do projeto de Arquitetura de Software - Clean Architecture

## Pré-requisitos

1. Php 7.2+

```sh
choco install php
```

2. Composer

```sh
choco install composer
```

3. O Driver do SQLite deve estar habilitado

Verificar se há um arquivo .sqlite na pasta data/

Caso não haja:

```sh
notepad C:/tools/php/7.2/php.ini
```

- Remover o ; de ";extension=pdo_sqlite"

## Instalar dependências

```sh
composer install
```

## Uso

```sh
composer serve
```

- Endpoint: localhost:8080/v1/ping

## Testar

```sh
composer test
```

## Author

👤 **Dayan Freitas | Rafael Stein Matsumoto | Israel Cadorin**

* Github: [@rafaelmatsumoto](https://github.com/rafaelmatsumoto)

## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_