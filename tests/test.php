<?php


/*
My god, don't look at this little test file, forget about it, it's just something, delete it
please
por favor
no seas malito :/

*/
require_once __DIR__ . '/../src/srphash.php';

use Jhoncorella\SrpHash\SrpHash;



$salt = 'your_unique_salt';//Debes obtener el salt que tiene la cuenta insertada directamente de la base de datos al igual que la contraseña.
$insertedPassword = 'user_password'; //Esta será la contraseña que obtendrás cuando el usuario envíe su formulario, es decir, es la contraseña insertada por el usuario.
$storedPasswordHash = 'hashed_password'; // variable que almacenará la contraseña ya codificada en su base de datos.

// Aquí simplemente creas la instancia y llamas a esta cosa fea.
$srpHash = new SrpHash($salt, $insertedPassword, $storedPasswordHash);

// Solo con esta cosita hermosa puedes realizar una verificación y ver si la contraseña hash corresponde a la almacenada.
$result = $srpHash->validatePassword();

// Esto simplemente muestra el resultado en la pantalla. ¿Okey?
echo $result;
