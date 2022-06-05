<template lang="">
<form @submit.prevent="ajouteremploye">

 <div class="form-group">
 <input type="text" class="form-control" placeholder="nom" v-model="nom">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="prenom" v-model="prenom">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="poste" v-model="poste">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="age" v-model="age">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="salaire" v-model="salaire">
 </div>
 
 
 
 <div class="form-group">
 Societe<select class="form-control" v-model="societe"
@change="getdepartements($event)" >
 <option v-for="c in Societes" :key="c.id"
:value=c.id>{{c.nomsociete}}</option>
 </select>
 </div>
 <div class="form-group">
Departement<select class="form-control" v-model="departement">
 <option v-for="sc in Departements" :key="sc.id"
:value=sc.id>{{sc.nomdepartement}}</option>
 </select>
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"/>
</div>
 
 <button type="submit" class="btn btn-block btn-primary">Ajouter
Employe</button>
</form>
</template>

<script>
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

export default {
 name: 'app',
 components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 },
 data() {
 return {
 nom: "",
 prenom: "",
 poste: "",
 age: "",
 salaire: "",
 image: "",
 societe:"",
 departement:"",
 Societes:[],
 Departements:[],

 }
 },
 methods: {

 ajouteremploye(){
 const pr = {
 nom:this.nom,
 prenom:this.prenom,
 poste:this.poste,
 age:this.age,
 salaire:this.salaire,
 societeID:this.societe,
 departementID:this.departement,
 image:this.image,
 }
console.log(pr);
 this.axios.post('http://localhost:8000/api/societes',pr)
 .then(() => {
 this.$router.push('/societes')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.image='../storage/images/'+e.target.files[0].name;

 },

 getdepartements(){
 this.axios.get('http://localhost:8000/api/departements').then(res =>
{
 this.Departements = res.data;
 }).catch(error => {
 console.log(error)
 });
 }
 },
 created() {
     this.getdepartements();
 this.axios.get('http://localhost:8000/api/societes').then(res =>
{
     console.log(res.data);

 this.Societes = res.data;
 }).catch(error => {
 console.log(error)
 });
 },
}
</script>
<style lang="">

</style>