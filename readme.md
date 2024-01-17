# SrpHash PHP Library

La librería `SrpHash` es un pequeño y sencillo proyecto destinado a la comunidad de SA-MP,  concretamente para las personas que utilicen la gamemode base SRP o Super RolePlay 2. Como proyecto base para sus comunidades, esta libreria realiza por ti el proceso de hasheo y verificación de contraseñas. Aunque para muchos este cometido sea sencillo es muy comun que muchas personas tengan problemas al realizar el hasheo en el apartado web. En fin esta libereria permite poder acceder usando la misma contraseña que tiene tu usuario en el servidor de sa-mp desde la web, de una manera sencilla y sumamente optimizada

## Clase: SrpHash

### Propiedades

- **`$salt` (string):** salt debe recibir el valor de la columna "salt", en la tabla 'player'
- **`$insertedPassword` (string):** insertPassword debe recibir la contraseña que el usuario inserto en el formulario de acceso.
- **`$storedPasswordHash` (string):** storedPasswordHash debe recibir el valor de la columna "pass", en la tabla 'player'

### Constructor

```php
/**
 * Constructor SrpHash.
 *
 * @param string $salt  Salt único utilizado para el hashing de contraseñas.
 * @param string $insertedPassword  La contraseña proporcionada por el usuario durante el inicio de sesión.
 * @param string $storedPasswordHash La contraseña hash almacenada en la base de datos.
 */
public function __construct(string $salt, string $insertedPassword, string $storedPasswordHash);

```

### Functions


```php

 *generateHash();

- **`generateHash();`** Hash la contraseña ingresada por el usuario usando el método sha-256. combinando la sal almacenada en la base de datos con la contraseña.

```

```php

 *validatePassword();

- **`validatePassword();`** Comprueba si la contraseña insertada en el momento del hash coincide con la contraseña que ya está hasheada en la base de datos. Si es así devuelve "Success", pero si no coinciden devolverá error"Error", todo en formato json

```

### Example

```php

 *Example

$salt = 'your_unique_salt';//Debes obtener el salt que tiene la cuenta insertada directamente de la base de datos al igual que la contraseña.
$insertedPassword = 'user_password'; //Esta será la contraseña que obtendrás cuando el usuario envíe su formulario, es decir, es la contraseña insertada por el usuario.
$storedPasswordHash = 'hashed_password'; // variable que almacenará la contraseña ya codificada en su base de datos.

// Aquí simplemente creas la instancia y llamas a esta cosa fea.
$srpHash = new SrpHash($salt, $insertedPassword, $storedPasswordHash);

// Solo con esta cosita hermosa puedes realizar una verificación y ver si la contraseña hash corresponde a la almacenada.
$result = $srpHash->validatePassword();

```