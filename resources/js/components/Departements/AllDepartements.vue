<template>
 <div>

 <h2 class="text-center">Liste des Departements</h2>

 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom Sous departement</th>
 <th>Image</th>
 <th>Societé</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="dep in Departements" :key="dep.id">
 <td>{{dep.nomdepartement}}</td>
 <td><img :src="'../storage/images/'+dep.imagedep"
:alt=dep.nomdepartement width="400" height="100"></td>
 <td>{{dep.societes.nomsociete}}</td>
 <td>
<router-link :to="{name: 'editDepartement', params: { id: dep.id }}" class="btn btn-success">Modifier
 </router-link> 
 <button @click.prevent="deleteDepartement(dep.id)"
class="btn btn-danger">Supprimer</button></td>
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
 Departements: [],
 Categ:[]

 }
 },
 mounted() {
 this.getDepartements();

 },
 methods: {
 deleteDepartement(id) {
 
 this.axios
 .delete(`http://localhost:8000/api/departements/${id}`)
 .then(res => {
 console.log(res)
 this.getDepartements();
 })
 .catch(error => {
 console.log(error)
 });
 
 },
 getDepartements(){
 this.axios
 .get('http://localhost:8000/api/departements')
 .then(res => {
 this.Departements= res.data;
 console.log(this.Departements)
 $(function() {$('#example').DataTable();});
 });

 }
 }
 }
</script>