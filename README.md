[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-c66648af7eb3fe8bc4f294546bfd86ef473780cde1dea487d3c4ff354943c9ae.svg)](https://classroom.github.com/online_ide?assignment_repo_id=10502429&assignment_repo_type=AssignmentRepo)
# Plantilla de proyecto CGIS

Esta es una descripción por defecto de **ProyectoPrueba**. Aquí deberá aparecer la descripción que también aparezca en el documento


## Instrucciones para su uso
1. Clone desde Visual Studio Code (o cualquier IDE de su preferencia) este repositorio.
2. Necesitamos un archivo de entorno `.env` para que nuestra aplicación sepa cómo conectarse a la base de datos y otros parámetros de configuración. Sin embargo, como el archivo `.env` contiene información sensible, como contraseñas, y la configuración depende del equipo, no se suele subir al repositorio (poniendo en `.gitignore` el archivo para que Git no lo considere). En su lugar, hemos subido un ejemplo `.env.example` con valores de ejemplo para los diferentes parámetros. En este caso, los valores de ejemplo son exactamente los mismos que necesitamos para trabajar con sail, así que tendremos que duplicar el archivo `.env.example`, copiándolo y pegándolo en el mismo directorio, y llamándolo `.env`
3. Arrancamos el contenedor de Sail por primera vez `docker run --rm \
   -u "$(id -u):$(id -g)" \
   -v $(pwd):/var/www/html \
   -w /var/www/html \
   laravelsail/php81-composer:latest \
   composer install --ignore-platform-reqs`. Más info: https://laravel.com/docs/master/sail#installing-composer-dependencies-for-existing-projects.
4. Ahora que tenemos disponible la carpeta de vendor, levante Laravel Sail desde Window Terminal (el terminal de la máquina Host Linux) `./vendor/bin/sail up -d` o `sail up -d` si ha realizado el alias de bash.
5. Abra en el navegador `http://localhost`

Recuerde que los comandos como `php artisan xxx` que vea en la documentación, deberán realizarse con `./vendor/bin/sail artisan comandoAEjecutar` o `sail artisan comandoAEjecutar` si ha activado el alias en bash, ya necesitan el entorno de desarrollo con MySQL, PHP, etc., que se encuentra en el contenedor de Sail. Si no, siempre podrá asociar un terminal directamente desde VSCode al contenedor de Sail para otras operaciones que deban ejecutarse en el servidor web que corre dentro del contenedor.

Cuando termine de trabajar, ejecute `./vendor/bin/sail down` o `sail down` si ha activado el alias en bash para parar la ejecución del contenedor. Recuerde que para volver a encenderlo necesitará ejecutar `./vendor/bin/sail up -d` o `sail up -d ` si ha activado el alias en bash desde el terminal de la máquina Host (Linux).

## Herramienta para escribir lenguaje de marcado
https://www.markdownguide.org/basic-syntax/ describe cómo se utiliza el markdown.

[StackEdit](https://stackedit.io/app#) puede ayudaros a trabajar con lenguajes de marca (markdown) para escribir este README.md
> Prueba las posibilidades antes de **Subir** cambios al repositorio.


**Dominio del problema**
Sabemos que existe un sistema de receta electrónica al que pueden acceder los médicos para recetar medicamentos a los pacientes, y al cual acceden los farmacéuticos para dispensar los medicamentos recetados. Sin embargo, los pacientes no tienen acceso a este sistema de ninguna manera a excepción de una hoja impresa que les da el médico cuando tienen una cita presencial, y ni siquiera obtienen eso cuando tienen una cita telefónica. 
Por tanto, queremos que los pacientes puedan ver de alguna manera los medicamentos que tienen recetados en cada momento y también poder acceder a su historial de medicamentos recetados, para que puedan tener mayor control sobre estos, puesto que es algo de gran importancia para ellos, tanto para saber si tienen o no que comprar medicamentos en función si lo tienen en casa ya o incluso para informar a otros profesionales sanitarios de lo que les han recetado otros médicos.
**Objetivos**
El objetivo de este proyecto es el diseño de una aplicación web a la que además de poder acceder los farmacéuticos para poder marcar un medicamento como dispensado, también pudiesen acceder los pacientes para poder ver qué medicamentos tienen recetados y poder acceder también a su historial de medicamentos recetados. 
De esta manera los pacientes podrían llevar un mejor control de los medicamentos que tienen. Por ejemplo, si el médico les prescribe algún medicamento podrían consultarlo en el sistema y comprobar si ya lo tienen en casa antes de ir a la farmacia a comprarlo.
•	OBJ-1. Gestión de pacientes – El sistema deberá gestionar el acceso de los pacientes a la aplicación, manteniendo su información confidencial. 
•	OBJ-2. Gestión de farmacéuticos – El sistema deberá gestionar el acceso de los farmacéuticos a la aplicación, manteniendo su información confidencial. 
•	OBJ-3. Gestión de recetas – El sistema deberá gestionar la visualización de las recetas 
•	OBJ-4. Gestión de medicamentos – 
•	OBJ-5. Gestión de tipo de medicamentos - 
**Usuarios del sistema**
•	Farmacéuticos – pueden acceder al sistema y ver los medicamentos prescritos en ese momento al paciente y marcar como dispensados los medicamentos que el paciente haya comprado
•	Pacientes – pueden acceder al sistema, pero sólo pueden ver los medicamentos que tienen recetados y su historial de medicamentos.
**Requisitos de información**
•	RI-001. Pacientes – El sistema deberá permitir almacenar la siguiente información sobre los pacientes: nombre, email, contraseña, NUHSA.
•	RI-002. Farmacéuticos – El sistema deberá permitir almacenar la siguiente información sobre los farmacéuticos: nombre, email, contraseña, número de colegiado. 
•	RI-003. Recetas – El sistema deberá permitir almacenar la siguiente información sobre las recetas: fecha de prescripción, fecha de dispensación, paciente al que ha sido prescrita, farmacéutico que la ha dispensado, medicamentos prescritos en ella, medicamentos dispensados de ella.
Para cada medicamento presente en la receta, el sistema deberá almacenar la siguiente información: nombre, dosis, tipo de medicamento.
•	RI-004. Medicamentos – El sistema deberá permitir almacenar la siguiente información sobre los medicamentos: nombre, dosis, tipo de medicamento.
•	RI-005. Tipo de medicamentos – El sistema deberá permitir almacenar la siguiente información sobre el tipo de medicamentos: nombre.
**Requisitos funcionales**
•	RF-1 – Como paciente quiero poder ver el número de recetas sin dispensar que tengo que un momento dado, incluyendo la fecha de prescripción y los medicamentos que han sido prescritos en cada una de ellas.
•	RF-2 – Como farmacéutico quiero poder ver el número de recetas que han sido dispensadas por mí, incluyendo la fecha de dispensación, los medicamentos dispensados y el paciente al que fueron dispensados.
•	RF-3 – Como paciente quiero poder saber si un medicamento me ha sido prescrito en algún momento al introducir su nombre en el sistema.
•	RF-4 – Como farmacéutico quiero que, al introducir el nombre de un medicamento en el sistema, este me indique de qué tipo de medicamento se trata.
**Requisitos no funcionales**
•	RN-1 - Un farmacéutico no puede dispensar un medicamento si este último no está recetado.
•	RN-2 – Un paciente puede ver sus recetas y su historial de medicamentos, pero no puede modificarlos.
•	RN-3 – Una receta no puede tener dos medicamentos iguales prescritos en ella.
•	RN-4 – La fecha de dispensación de los medicamentos de una receta tiene que ser posterior a la de su prescripción.
•	RN-5 – Un medicamento no puede tener más de un tipo a la vez.

 




