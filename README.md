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

------------------------------------------

### aggirnamento carlo 1 dic 2023:
fixato il problema ddell upload delle immagini e del curriculum, e del relativo edit i passi da fare sono semplici.
- modificare nel file .env la voce FILESYSTEM_DISK=  in public anzichè local; ho aggiornato anche l env.example
- ho modificato il file filesystem.php dentro config alla prima voce 'default' => env('FILESYSTEM_DISK', 'public'), per sicurezza.
- - Creaate il Symlink "storage" nella cartella public con il seguente comando
```
php artisan storage:link
```
cancellatevi i file che avete provato a uploadare per sicurezza e fate un 
```
php artisan migrate:refresh --seed
```
ora provate a registrarvi come dottore caricando immagine e curriculum dovreste vederlo e anche editarlo i controller come li avete scritti erano corretti il problema stava che è necessario fare symlink che è una copia virtuale di storage ma in una posizione dove laravel consente di andare a pescare i file!
