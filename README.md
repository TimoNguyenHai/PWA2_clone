# Programovanie webových aplikácií 2 
**Projekt 5 - Rezervačný systém jazykovej školy<br/>**
**Students: <br/>**
* Chowaniecová Denisa
* Nguyen Hai Trieu


# Navigation:
- [Git initialization](#git-initialization)
- [DB Scheme](#db-scheme)
- [Tasks](#tasks)


# Git initialization
1. Run ```git clone https://github.com/xchowaniecova/pwa2_final_project.git```

2. Setup up the ```.env```:
* Main app settings ```APP_NAME``` and ```APP_URL``` (if you have other then localhost)
* Setup database connection ```DB_DATABASE```, ```DB_USERNAME```, ```DB_PASSWORD```, cf. with phpmyadmin
* Verify that ```SESSION_DRIVER=file```
* After setup ```run php artisan key:generate```
3. Run ```php artisan migrate:fresh --seed``` to migrate and seed the tables
4. Run ```php artisan serve``` to run the app
5. Visit the link <http://127.0.0.1:8000/register> to register user

# Login
Ing. Martin Klauco, PhD.<br/>
Username: martin.klauco@stuba.sk<br/>
Password: password<br/>

Ing. Lubos Cirka, PhD.<br/>
Username: lubos.cirka@stuba.sk <br/>
Password: password<br/>

# DB Scheme
Click on the picture for the high resolution quality!
![DB Scheme](/theory/schema_pwa_project.png)

# Tasks

### Task 1
Aplikácia umožňuje zaregistrovať do systému lektorov. Vyžiada si od nich nasledujúce povinné údaje
* Osobné číslo lektora
* Meno
* Priezvisko
* Email<br/>

a nepovinné údaje:<br/>

* Telefón

### Task 2
Aplikácia umožňuje zaregistrovať do systému jazyky(1). Vyžiada si od nich nasledujúce povinné údaje
* Kód jazyka
* Názov jazyka
* Skratka jazyka
* lektor (zo zoznamu lektorov)
* Stupeň<br/>
    - začiatočník<br/>
    - mierne pokročilý<br/>
    - pokročilý<br/>
* Deň<br/>
    - pondelok<br/>
    - ...<br/>
    - piatok<br/>
* Čas<br/>
    - doobeda<br/>
    - poobede<br/>
* Číslo učebne
* Poschodie
* Počet miest

(1) Jeden kurz je iba v jednom poldni v týždni.


### Task 3
Aplikácia umožňuje rezervovať jazyk. Vyžiada si nasledujúce povinné údaje:
* Názov jazyka
* Meno študenta
* Priezvisko študenta
* Email študenta
* Adresa bydliska študenta 
    - ulica<br/>
    - psč<br/>
    - mesto<br/>
    - krajina<br/>

nepovinné údaje:<br/>

* Telefón študenta

### Task 4
Po rezervovaní sa odošle študentovi notifikačný email o jeho rezervácii.

nepovinné údaje:<br/>

* Telefón študenta

### Task 4
Po rezervovaní sa odošle študentovi notifikačný email o jeho rezervácii.

### Task 5
Aplikácia generuje zoznam učební. Po kliknutí na učebňu sa zobrazí týždenný kalendár.

### Task 6
V kalendári budú označené dni, keď je učebňa obsadená. Kliknutím na poldeň v kalendári
sa zobrazí stránka s kompletnými informáciami o učebni, jazyku, ktorý sa v nej vyučuje a
zapísaných študentov. Bude obsahovať aj tlačidlo na generovanie faktúry za výuku jazyka
vo formáte PDF.

### Task 7
Aplikácia generuje zoznam učební vo formáte **PDF**.

### Task 8
Aplikácia generuje zoznam rezervácií vo formáte **XLSX**.

### Task 9
Tabuľky v databáze vytvorte na základe údajov zadania. Tabuľky musia spĺňať 3. normálnu formu. Ďalej musia mať "stĺpce" so správnymi dátovými typmi.

### Task 10
Pre administrátora vytvorte stránku, ktorá bude obsahovať nasledujúce prehľady:
* Počet všetkých učební
* Počet všetkých študentov
* Počet všetkých lektorov
* Počet všetkých jazykových kurzov
