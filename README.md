## **Dominio del problema**
Sabemos que existe un sistema de receta electrónica al que pueden acceder los médicos para recetar medicamentos a los pacientes, y al cual acceden los farmacéuticos para dispensar los medicamentos recetados. Sin embargo, los pacientes no tienen acceso a este sistema de ninguna manera a excepción de una hoja impresa que les da el médico cuando tienen una cita presencial, y ni siquiera obtienen eso cuando tienen una cita telefónica. Por tanto, queremos que los pacientes puedan ver de alguna manera los medicamentos que tienen recetados, para que puedan tener mayor control sobre estos, puesto que es algo de gran importancia para ellos, tanto para saber si tienen o no que comprar medicamentos en función si lo tienen en casa ya o incluso para informar a otros profesionales sanitarios de lo que les han recetado otros médicos.
## **Objetivos**
  El objetivo de este proyecto es el desarrollo de una aplicación web a la que además de poder acceder los farmacéuticos, también pudiesen acceder los pacientes para poder ver qué medicamentos tienen recetados. De esta manera los pacientes podrían llevar un mejor control de los medicamentos que tienen. Por ejemplo, si el médico les prescribe algún medicamento podrían consultarlo en el sistema y comprobar si ya lo tienen en casa antes de ir a la farmacia a comprarlo. 
 - OBJ-1. Gestión de pacientes – El sistema deberá gestionar el acceso de los pacientes a la aplicación, así como su registro en ella y el borrado del perfil si así lo deseara el usuario.
 - OBJ-2. Gestión de farmacéuticos – El sistema deberá gestionar el acceso de los farmacéuticos a la aplicación, así como su registro en ella y el borrado del perfil si así lo deseara el usuario. 
 - OBJ-3. Gestión de  recetas – El sistema deberá gestionar la visualización de las recetas por parte de pacientes y farmacéuticos, así como la creación, edición y borrado de ellas. 
 - OBJ-4. Gestión de medicamentos – El sistema deberá gestionar la visualización de los medicamentos incluidos en el sistema por parte de pacientes y farmacéuticos, así como la creación, edición y borrado de ellos. 

## **Usuarios del sistema**
 - Farmacéuticos – pueden acceder al sistema y ver los medicamentos prescritos en ese momento al paciente.
 - Pacientes – pueden acceder al sistema, pero sólo pueden ver los medicamentos que tienen recetados.

## **Requisitos de información**
 - RI-001. Pacientes – El sistema deberá permitir almacenar la siguiente información sobre los pacientes: nombre, email, contraseña, NUHSA. 
 - RI-002. Farmacéuticos – El sistema deberá permitir almacenar la siguiente información sobre los farmacéuticos: nombre, email, contraseña, número de colegiado.
 - RI-003. Recetas – El sistema deberá permitir almacenar la siguiente información sobre las recetas: fecha, paciente al que ha sido prescrita, farmacéutico que la ha dispensado, medicamentos prescritos en ella. Para cada medicamento presente en la receta, el sistema deberá almacenar la siguiente información: nombre, dosis, tipo de medicamento.
 - RI-004. Medicamentos – El sistema deberá permitir almacenar la siguiente información sobre los medicamentos: nombre, dosis, tipo de medicamento. 
 - RI-005. Tipo de medicamentos – El sistema deberá permitir almacenar la siguiente información sobre el tipo de medicamentos: nombre.

## **Requisitos funcionales**
 - RF-1.1 - Como paciente quiero poder acceder al sistema para ver mi perfil, los farmacéuticos disponibles, las recetas prescritas y los distintos medicamentos que hay en el sistema.
 - RF-1.2 - Como paciente quiero poder registrarme en el sistema para poder acceder posteriormente a él.
 - RF-1.3 – Como paciente quiero poder ver el número de recetas que tengo que un momento dado, incluyendo la fecha de prescripción y los medicamentos que han sido prescritos en cada una de ellas.
 - RF-1.4 - Como paciente quiero poder ver en una sección distinta, una lista con los medicamentos que hay en el sistema, incluyendo su nombre, dosis y tipo de medicamento.
 - RF-1.5 - Como paciente quiero poder eliminar mi perfil en cualquier momento si así lo deseo.
 - RF-2.1 - Como farmacéutico quiero poder acceder al sistema para ver mi perfil, los pacientes registrados, las recetas prescritas y los distintos medicamentos que hay en el sistema.
 - RF-2.2 - Como farmacéutico quiero poder registrarme en el sistema para poder acceder posteriormente a él.
 - RF-2.3 - Como farmacéutico quiero poder eliminar mi perfil en cualquier momento si así lo deseo.
 - RF-2.4 – Como farmacéutico quiero poder ver el número de recetas que han sido dispensadas por mí incluyendo la fecha, los medicamentos dispensados y el paciente al que fueron dispensados.
 - RF-2.5 – Como farmacéutico quiero poder ver en una sección distinta, una lista con los medicamentos que hay en el sistema, incluyendo su nombre, dosis y tipo de medicamento.
 - RF-2.6 - Como farmacéutico quiero poder gestionar la creación de recetas nuevas y la adición de medicamentos a ellas.
 - RF-2.7 - Como farmacéutico quiero poder gestionar el borrado de recetas del sistema.
## **Requisitos no funcionales**
 - RN-1 - Un farmacéutico no puede dispensar un medicamento si este último no está recetado.
 - RN-2 – Un paciente puede ver sus recetas y los medicamentos prescritos en ellas, pero no puede modificarlos.
 - RN-3 – Una receta no puede tener dos medicamentos iguales prescritos en ella.
 - RN-4 – La fecha de dispensación de los medicamentos de una receta tiene que ser posterior a la del momento actual.

## Modelo conceptual UML
![Modelo conceptual drawio (1)](https://github.com/CGIS-2023/proyecto-cgis-2023-gemmiscab/assets/124779403/d60aaef8-5f41-41b5-a792-ad03db11529d)


 





