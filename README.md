En base a lo anterior, realiza una pequeña aplicación en Laravel que conste de las siguientes tablas:

Tablas de la Base de Datos:

users
publications
comments

La petición es:
Realiza un CRUD, utiliza Bootstrap y en las vistas el uso de Layouts en Blade.

El CRUD debe consistir en un formulario, en la cual se puedan realizar publicaciones.
Para ingresar a esta vista, es necesario estar autenticado en el sistema, no se puede acceder a las rutas de este si no esta autenticado.
Se debe desplegar una lista de las publicaciones ya existentes.
Al momento de entrar a visualizar una publicación, debe existir la posibilidad de poder visualizar todos los comentarios y además ingresar un comentario en la publicación, en caso de que el usuario ya haya comentado la publicación, este no podrá volver a realizar dicha acción.
Al momento de que se genere un nuevo comentario, es necesario que se envíe un correo electrónico al autor de la publicación (Puedes utilizar Mailtrap para Testing, aunque lo importante no es la evidencia del envío, sino el código).
Recuerda usar bootstrap en el diseño, y que puedes ingresar todas las publicaciones que quieras, insertando campos en la tabla publications.
