<template lang="">
<form @submit.prevent="modifieremploye">

 <div class="form-group">
 <input type="text" class="form-control" placeholder="nom" v-model="employe.nom">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="prenom" v-model="employe.prenom">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="poste" v-model="employe.poste">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="age" v-model="employe.age">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="salaire" v-model="employe.salaire">
 
 </div>
 <div class="form-group">
 Societés<select class="form-control" v-model="employe.societeID"
@change="getdepartements($event)" >
 <option v-for="c in Societes" :key="c.id" :value=c.id>{{c.nomsociete}}</option>
 </select>
 </div>
 <div class="form-group"> Departement 
 <select class="form-control" v-model="employe.departementID">
 
 <option v-for="sc in Departements" :key="sc.id" :value=sc.id >{{sc.nomdepartement}}</option>
 </select>
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"
:files="employe.image"/>
</div>
 
 <button type="submit" class="btn btn-block btn-primary">Modifier
employe</button>
</form>
</template>

<script>
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

export default {
 name: 'edit',
 components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 },
 data() {
 return {
 employe:{},
 Societes:[],
 Departements:[],

 }
 },
 methods: {

 modifieremploye(){
 this.axios.patch(`http://localhost:8000/api/employes/${this.$route.params.id}`,this.employe)
 .then(() => {
 this.$router.push('/employes')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.employe.image=e.target.files[0].name;

 },
 
 
 getdepartements(){
 this.axios.get('http://localhost:8000/api/departements').then(res =>
{
 this.Departements=res.data;
 }).catch(error => {
 console.log(error)
 });
 },
 getSocietes(){
 this.axios.get('http://localhost:8000/api/societes').then(res => {
 this.Societes = res.data;
 }).catch(error => {
 console.log(error)
 });
 },
 getOneEmploye(){
 this.axios
 .get(`http://localhost:8000/api/employes/${this.$route.params.id}`)
 .then((res) => {
 this.employe = res.data;
 });
 }
 },
 created() {
     this.getdepartements();
 this.getOneEmploye() ;
 this.getSocietes();
 },
}
</script>
<style lang="">

</style>
