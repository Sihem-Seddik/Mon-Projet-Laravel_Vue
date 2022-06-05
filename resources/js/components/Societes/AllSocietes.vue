<template>
 <div>

 <h2 class="text-center">Liste des societés</h2>

 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom societé</th>
 <th>Image</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="soc in Societes" :key="soc.id">
 <td>{{soc.nomsociete}}</td>
 <td><img :src="'../storage/images/'+soc.imagesociete" :alt=soc.nomsociete width="400" height="100"></td>
 <td>
     <router-link :to="{name:'editSociete', params:{id:soc.id}}" class="btn btn-success">Modifier </router-link>
 <button @click.prevent="deleteSociete(soc.id)" class="btn btn-danger">Delete</button> </td>
 </tr>
 </tbody>
 </table>
 </div>
</template>

<script>

//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery'; 


 export default {
 data() {
 return {
 Societes: []
 }
 },
 mounted() {
 this.getSocietes();
 },
 methods: {
 deleteSociete(id) {
 this.axios
 .delete(`http://localhost:8000/api/societes/${id}`)
 .then(res => {
 console.log(res)
 this.getSocietes();
 })
 .catch(error => {
 console.log(error)
 });
 },
 getSocietes(){
 this.axios.get('http://localhost:8000/api/societes')
 .then(response => {
 this.Societes= response.data;
  $(function() {$('#example').DataTable();}); 

 });
 }
 }
 }
</script>