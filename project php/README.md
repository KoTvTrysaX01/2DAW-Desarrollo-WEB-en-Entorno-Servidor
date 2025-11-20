# Helado Express - 2 DAW - Vadim Elshin

## Funcionalidad del sitio web
La funcionalidad del sitio se puede dividir en tres partes: la parte pública, la parte privada y la parte administrativa.

### Parte Pública
Al visitar el sitio web por primera vez, el usuario accede al área pública. Allí puede:

    1. сonsultar las valoraciones de otros usuarios.
    2. enviar un correo electrónico a la administración indicando tu dirección de correo electrónico.
    3. ver el contenido del carrito de la compra.
    4. registrarse o iniciar sesión en el sitio.
    5. evaluar el catálogo de productos dividido en categorías utilizando el menú correspondiente.
    6. ordenar los productos por atributos e ir a la página del producto haciendo clic en él.
    7. especificar la cantidad del producto y añadirlo a tu carrito. También puedes eliminar productos seleccionados de tu carrito.

Para comprar un producto y utilizar otras funciones del sitio, el usuario __DEBE__ registrarse o iniciar sesión.

### Parte Privada

Para acceder a la sección privada del sitio, el usuario debe registrarse introduciendo su nombre de usuario, correo electrónico y contraseña, o iniciar sesión utilizando la información correcta(vadim@email.com 123). Tras iniciar sesión, se mostrará un mensaje de bienvenida al usuario en la página principal. Allí puede:
    
    1. comprar un producto del carrito. Tras hacer clic en el botón, se le presentará un formulario con información sobre el artículo, sus datos personales y campos para su número de teléfono y dirección. ACTUALIZACIÓN: tras enviar el formulario, el usuario recibirá un correo electrónico con la información del pedido.
    2. consultar los últimos 10 pedidos en tu historial de compras. Si tienes más de 10 pedidos, puedes verlos todos haciendo clic en el botón.
    3. enviar su reseña. Estará disponible para todos los usuarios del sitio.

### Parte Administrativa

Para acceder al panel de administración del sitio, debe iniciar sesión como usuario con privilegios de administrador. Un ejemplo de dicho usuario es root (root@email.com 1234; reis@email.com 4567). El administrador puede:
    1. Todo lo anterior.
    2. Tras iniciar sesión, el administrador accede a una función oculta con tablas CRUD. Allí, puede ver, crear, eliminar y actualizar todos los registros de la base de datos del sitio.