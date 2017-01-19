Configuration de l'hôte sur le serveur web
=========

Votre serveur doit pointer vers le dossier web de l'installation

* Voici un exemple de configuration de site virtuel sous apache

```apache.conf
<VirtualHost *:80>
    ServerName appli.domain.be

    DocumentRoot /var/www/moninstall/web
    
    <Directory /var/www/moninstall/web>
       # enable the .htaccess rewrites
       AllowOverride All
      Require all granted
    </Directory>    

    ErrorLog /var/log/apache2/project_error.log
    CustomLog /var/log/apache2/project_access.log combined
</VirtualHost>
```

* Voici un exemple de configuration d'hôte sous nginx

```apache.conf
server {
    server_name example.com www.example.com your_server_ip;
    root /var/www/moninstall/web;

    location / {
        # try to serve file directly, fallback to app.php
        try_files $uri /app.php$is_args$args;
    }

    location ~ ^/app\.php(/|$) {
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        # Prevents URIs that include the front controller. This will 404:
        # http://domain.tld/app.php/some-path
        # Remove the internal directive to allow URIs like this
        internal;
    }

    error_log /var/log/nginx/symfony_error.log;
    access_log /var/log/nginx/symfony_access.log;
}
```

Si vous désirez plus d'infos [vous les trouverez ici](http://symfony.com/doc/current/setup/web_server_configuration.html)
