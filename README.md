# PROJECT
___

## Problema Hostinger. Directorio __public_html__

### Copiar el contenido de la carpeta public

Copiar todo el contenido de la carpeta __/public__ a la carpeta expuesta por apache en el servidor __/public_html__.

### Añadir la siguiente modificación al fichero :
[/bootstrap/app.php](/bootstrap/app.php)

Justo despues de la asignación de la variable __$app__

```php
$app->bind('path.public', function() {
    return base_path() . '/public_html';
});
```
