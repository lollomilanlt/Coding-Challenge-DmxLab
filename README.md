# Applicazione sviluppata con CakePHP

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

[CakePHP](https://cakephp.org) 3.x.
,[PHP](https://www.php.net/downloads) Version 7.3.25

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

Quindi visita `http://localhost:8765` per a sfogliare il progetto!

3. Setup Database

Tra i file del progetto troverai "consegnaf.sql", file atto a ripristinare il database dove si appoggia l'applicazione.

Credenziali admin:

USR:   admin

PASSW: lorenzo1997

Ho aggiunto la feature che l'admin rifiutando le richieste di adesione possa anche "bannare" l'account di un socio retrocedendolo a Guest...esso non potrà più visualizzare i corsi disponibili.

Progetto a cura di Lorenzo Ceglia.

## Premessa

Questi sono i miei primi passi gli strumenti che ho elencato, non avevo mai "smanettato" praticamente con un framework, avevo studiato Java Spring ma non ho mai avuto la possibilità
di sfruttarlo sul campo pratico.
Detto questo sono veramente contento del risultato nonostante la consegna non fosse particolarmente ardua, è stato stimolante sviluppare le basi del progetto con metodologie nuove, adesso sono consapevole che una piccola sfida simile mi abbia permesso di affacciarmi a strumenti che sicuramente sfrutterò nel mio futuro prossimo.
Procede un mio piccolo riassunto esperienziale.

Enjoy :)


## Considerazioni progettazione DB

Come ho detto qualche riga più su, la consegna non era particolarmente impegnativa, mi sono limitato a progettare 3 tabelle: Users, Requests e Courses,
Tra Users e Requests ho immaginato un'associazione 1a1 inserendo la chiave secondaria di Users nella tabella Requests, questo mi sarebbe stato utile più avanti per modificare lo stato dell'utente una volta che la richiesta viene accettata.
Ho gestito lo stato dell'account utente con due flag: shareholder (Socio) e admin di tipo boolean (tinyint).
Sono consapevole poi che il framework mi avrebbe aiutato a gestire meglio questa situazione con il campo role ma ho scoperto questa cosa troppo tardi.
Per quanto riguarda la tabella dei corsi non ho sviluppato associazioni verso le altre due perchè le uniche relazioni che vengono effettuate sono quelle dedite alla visualizzazione e alla cancellazione, l'ho quindi considerata come un semplice archivio.


## Aspetti positivi

Provo molta soddisfazione quando scrivo righe di codice e subisco un feedback immediato dall'applicazione che sto sviluppando, quindi in breve mi sono divertito!
Devo assolutamente ringraziare la documentazione di CakePhp che ho trovato ben fornita e ben strutturata.


## Difficoltà

Le difficoltà che ho riscontrato sono state l'approccio ad un framework a me inizialmente sconosciuto e alle sue funzioni che dovrebbero semplificare la vita a noi sviluppatori se queste prima vengono capite!
Ad ogni modo ho approcciato il tutto sperimentando le operazioni CRUD più semplici, questo ha portato poi ad un mio errore di progettazione che riporterò nella prossima sezione.
Resto soddifatto del prodotto finale anche se mi vergogno un pò della sua situazione grafica :(
Lascio il repo aperto con la speranza che tutto questo possa essere utile ad un novizio che come me, sta iniziando adesso ad usare questi metodi/strumenti.




## Aspetti da migliorare

1. Sicuramente l'aspetto grafico, nemmeno con una base di bootstrap il tutto riesce a essere decente, sicuramente un aspetto che dovrò migliorare in futuro.
2. Iniziando dalle operazioni CRUD ho iniziato a lavorare con la tabella dei Corsi con l'intento poi di trasferire le funzioni che stavo sviluppando nell'area dell'admin.
   Questo purtroppo non è successo ma è stata proprio la parte riservata ai corsi a diventare la dashboard dell'admin. In poche parole l'admin doveva essere gestito insieme agli    altri utenti e invece si è ritrovato insieme ai corsi.
3. Per i redirect verso le pagine utenti ho un pò improvvisato quando invece il framework poteva darmi una mano con le routes
4. Ho gestito parzialmente gli errori di duplicati sul db, pensavo sarebbe bastato creare una view per quello specifico errore causato per esempio da un'email duplicata  e          invece se un utente prova a inviare due volte la richiesta di adesione viene renderizzata la medesima view... (gestione di quell'errore non modulare quindi) 
5. Non e' possibile accedere alle pagine se non si e' loggati ma le pagine dell'admin modificando l'url purtroppo sono accessibili


## Questioni da porre a Dario (riportate così come le ho scritte sulle note del telefono)

1. Chiedere bene il model del mvc (table e articles) per fare definitivamente chiarezza
2. Se è possibile utilizzare il pattern dao
3. Non mi è sembrato di lavorare con oggetti
4. Definizione insert di massa
5. Spiegazione AppController
