# Applicazione sviluppata con CakePHP

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

Uno scheletro per creare applicazioni con [CakePHP](https://cakephp.org) 3.x.

Il codice sorgente del framework può essere trovato qui: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installazione

1. Scarica [Composer](https://getcomposer.org/doc/00-intro.md) o aggiorna `composer self-update`.
2. Avvia `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

Se il Composer è installato globalmente, avvia

```bash
composer create-project --prefer-dist "cakephp/app:^3.8"
```

Nel caso tu voglia usare un nome custom per la cartella dell'applicazione (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist "cakephp/app:^3.8" myapp
```

Ora puoi sia usare il web server integrato della tua macchina per vedere la home page di default del framework, o avviare il suo web server integrato con:

```bash
bin/cake server -p 8765
```

Quindi visita `http://localhost:8765` per vedere la pagina di benvenuto!


Progetto a cura di Lorenzo Ceglia, queste sono le mie prime orme con questi strumenti.

## Premessa


## Considerazioni progettazione DB
