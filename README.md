## Passi da effettuare per UTILIZZARE questo template
1. Aprire questa repository su github e cliccare sul pulsante `Use this template > Create a new repository`
2. Clonare la repository appena creata su `VS Code`
3. Aprire il `terminale`
4. Copiare il file `.env.example` e rinominarlo in `.env`
5. Eseguire il comando `composer install`
6. Eseguire il comando `php artisan key:generate`
7. Eseguire il comando `npm i` o `npm install`
8. Aprire un secondo `terminale`
9. Eseguire il comando `php artisan make:controller Guest/PageController`
10. Eseguire il comando `php artisan make:model NomeModel`
11. Effettuare la connessione al DB modificando il file `.env`
12. In uno dei due terminali, eseguire il comando `php artisan serve`. Nell'altro, `npm run dev`