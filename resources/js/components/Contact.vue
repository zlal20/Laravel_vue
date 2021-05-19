<template>
    <div>

        <h1 class="text-center">  Agenda de Contactos </h1>
        <hr>

<!-- Button trigger modal -->
<button @click="openModal();" type="button" class="btn btn-primary" >
  Agregar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





                    
            <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Domicilio</th>
                <th scope="col" colspan="2" class="text-center">Accion</th>






                </tr>
            </thead>
            <tbody>
                
                <tr v-for="contact in contacts" :key="contact.id">
                
                <th scope="row">{{contact.id}} </th>
                

                
                
                <td>{{contact.first_name}}</td>
                <td>{{contact.email}}</td>
                <td>{{contact.phone}}</td>
                <td>{{contact.address}}</td>
                
                            <td>
                            <button class="btn btn-warning"> Editar</button>

                            </td>

                            <td>
                            
                         
                            <button @click= "eliminar(contact.id)" class="btn btn-danger"> Eliminar</button>

                            </td>



                </tr>
            </tbody>
            </table>

    </div>  

</template>


    <script>
        export default{
            data() {

                return{


                        contacts:[], 
                        titleModal:'',
                        modal:0,
                   

                }



            },
              
              
              
              methods:{

                                
        //se crea el metodo list para traer los datos de la bd
          async list(){

        //la variable accede a la tabla de la b
          const res = await axios.get('contacts')
          this.contacts = res.data;


            },


              async eliminar(id) {

            //accede a la tabla ´para eliminar un registro y concatena el id 
            const res = await axios.delete('/contacts/' + id );
            this.contacts = res.data;
                                            
            //manda a llamar al metodo list para no actualizar el navegador 
            this.list();

            },

          openModal() {
                                            
          //verifica si es verdadero
          this.modal=1;



                                              
        },


      closeModal() {

  //indica verifica si es falso 
          this.modal=0;

        },


            },

      
      
      //creamos un metodo para llamar los datos
  created(){

                                
      //el constructor manda a llamar al metodo list para llenar los datos del front
      this.list();




                        }

                               }
    

    </script>
    

<style >


</style>
