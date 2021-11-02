<template>
    <div class="container container-task">
        <div class="row">
            <div class="col-md-6">
                <h2>Lista de Cita</h2>
                <table class="table text-center"><!--Creamos una tabla que mostrará todas las tareas-->
                        <thead>
                            <tr>
                                <th scope="col">ID Paciente</th>
                                <th scope="col">Fecha Cita</th>
                                <th scope="col">ID Doctor</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="task in arrayTasks" :key="task.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                                <td v-text="task.id_paciente"></td>
                                <td v-text="task.fecha_cita"></td>
                                 <td v-text="task.id_doctor"></td>
                                
                                 

                                <td>
                                    <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                    <button class="btn" @click="loadFieldsUpdate(task)">Modificar</button>
                                    <!--Botón que borra la tarea que seleccionemos-->
                                    <button class="btn" @click="deleteTask(task)">Borrar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="col-md-6">
                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->
                    <label>ID Paciente</label>
                    <input v-model="id_paciente" type="text" class="form-control">

                </div>

                 <div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->
                    <label>Fecha Cita</label>
                    <input v-model="fecha_cita" type="text" class="form-control">
                </div>

                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->
                    <label>ID Doctor</label>
                    <input v-model="id_doctor" type="text" class="form-control">
                </div>


            

                <div class="container-buttons">
                    <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                    <button v-if="update == 0" @click="saveTasks()" class="btn btn-success">Añadir</button>
                    <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                    <button v-if="update != 0" @click="updateTasks()" class="btn btn-warning">Actualizar</button>
                    <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                    <button v-if="update != 0" @click="clearFields()" class="btn">Atrás</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                id_paciente:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                fecha_cita:"",
                id_doctor:"",
              
                
                update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado
                          ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/
                arrayTasks:[], //Este array contendrá las tareas de nuestra bd
            }
        },
        methods:{
            getTasks(){
                let me =this;
                let url = '/cita' //Ruta que hemos creado para que nos devuelva todas las fecha_cita
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayTasks = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            saveTasks(){
                let me =this;
                let url = '/cita/guardar' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'id_paciente':this.id_paciente,
                    'fecha_cita':this.fecha_cita,
                    'id_doctor':this.id_doctor,
                
                   

                }).then(function (response) {
                    me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });   

            },
            updateTasks(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('/cita/actualizar',{
                    'idcita':this.update,
                    'id_paciente':this.id_paciente,
                    'fecha_cita':this.fecha_cita,
                    'id_doctor':this.id_doctor,
                
                    

                }).then(function (response) {
                   me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
                this.update = data.idcita
                let me =this;
                let url = '/cita/buscar?idcita='+this.update;
                axios.get(url).then(function (response) {
                    me.id_paciente= response.data.id_paciente;
                    me.fecha_cita= response.data.fecha_cita;
                    me.id_doctor= response.data.id_doctor;
                   
                  

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
            deleteTask(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegidcitao
                let me =this;
                let task_id = data.idcita
                if (confirm('¿Seguro que deseas borrar esta tarea?')) {
                    axios.delete('/cita/borrar/'+task_id
                    ).then(function (response) {
                        me.getTasks();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.id_paciente = "";
                this.fecha_cita = "";
                this.id_doctor = "";
              
          

                this.update = 0;
            }
        },
        mounted() {
           this.getTasks();
        }
    }
</script>

