#!/bin/bash

# supprime la BDD et la recrée
php artisan db:wipe && php artisan migrate