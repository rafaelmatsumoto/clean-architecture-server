[![Build Status](https://travis-ci.com/rafaelmatsumoto/clean-architecture-server.svg?token=epmMNVLLvizSuJ7VzAhz&branch=master)](https://travis-ci.com/rafaelmatsumoto/clean-architecture-server)

<h1 align="center">Arquitetura Limpa 👋</h1>
<p>
</p>

> Aplicação do projeto de Arquitetura de Software - Clean Architecture

## Pré-requisitos

1. Php 7.2+
### Windows
```sh
choco install php
```

### ![Arch](https://github.com/JotaRandom/archlinux-artwork/blob/master/icons/archlinux-icon-crystal-16.svg) Arch Linux
```sh
yay php 
```

2. Composer

### Windows
```sh
choco install composer
```

### ![Arch](https://github.com/JotaRandom/archlinux-artwork/blob/master/icons/archlinux-icon-crystal-16.svg) Arch Linux
```sh
yay composer
```


3. O Driver do SQLite deve estar habilitado

Verificar se há um arquivo .sqlite na pasta data/

Caso não haja:

### Windows
```sh
notepad C:/tools/php/7.2/php.ini
```

- Remover o ; de ";extension=pdo_sqlite"

### ![Arch](https://github.com/JotaRandom/archlinux-artwork/blob/master/icons/archlinux-icon-crystal-16.svg) Arch Linux
```sh
 vim etc/php/php.ini
```

- Remover o ; de ";extension=pdo_sqlite"

Para poder instalar o modulo do sqlite

```sh
pacman -S php-sqlite 
```

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

## Referências

- [Wiki](https://github.com/rafaelmatsumoto/clean-architecture-server/wiki)

## Author

👤 **Dayan Freitas | Rafael Stein Matsumoto | Israel Cadorin**

* Github:   
[@rafaelmatsumoto](https://github.com/rafaelmatsumoto)  
[@dayanFreitas](https://github.com/dayanFreitas)
## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
