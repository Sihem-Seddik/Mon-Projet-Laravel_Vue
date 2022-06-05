<template>
 <div>
 <h2 class="text-center">Liste des Employés </h2>

 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom</th>
 <th>Prenom</th>
 <th>Poste</th>
 <th>Age</th>
 <th>Societé</th>
 <th>Salaire</th>
 <th>Departement</th>
 <th>Image</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="p in Employes" :key="p.id">
 <td>{{p.nom}}</td>
 <td>{{p.prenom}}</td>
 <td>{{p.poste}}</td>
 <td>{{p.age}}</td>
 <td>{{p.societes.nomsociete}}</td>
 <td>{{p.salaire}}</td>
 <td>{{p.departements.nomdepartement}}</td>
 <td><img :src="'../storage/images/'+p.image" :alt=p.image
width="100"></td>
 <td>
     <router-link :to="{name: 'editEmploye', params: { id: p.id}}" class="btn btn-success">Modifier</router-link>
 <button @click.prevent="deleteEmploye(p.id)" class="btn btn-danger">Supprimer</button></td>
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
 Employes: []
 }
 },
 mounted() {
 this.getEmployes();
 },
 methods: {
 deleteEmploye(id) {
 
 this.axios
 .delete(`http://localhost:8000/api/employes/${id}`)
 .then(res => {
 console.log(res)
 this.getEmployes();
 })
 .catch(error => {
 console.log(error)
 });
 
 },
 getEmployes(){
 this.axios
 .get('http://localhost:8000/api/employes/')
 .then(response => {
 this.Employes = response.data;
 $(function() {$('#example').DataTable();});
 });
 }
 }
 }
</script>