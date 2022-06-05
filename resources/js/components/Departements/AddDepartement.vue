<template lang="">

<form @submit.prevent="ajouterDepartement">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="nomdepartement">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"/>
</div>
 <div class="form-group">
 Societés<select class="form-control" v-model="societeID">
 <option v-for="c in Societes" :key="c.id"
:value=c.id>{{c.nomsociete}}</option>
 </select>
 </div>
 <button type="submit" class="btn btn-block btn-primary">Ajouter Departement</button>
</form>
</template>
<script>
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
export default {
 components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 },
 data() {
 return {
 nomdepartement: "",
 imagedep: "",
 societeID:"",
 Societes:[]
 }
 },
 methods: {

 ajouterDepartement(){
 const depar = {
 nomdepartement:this.nomdepartement,
 imagedep:this.imagedep,
 societeID:this.societeID
 }
 this.axios.post("http://localhost:8000/api/departements",depar)
 .then(() => {
 this.$router.push('/departements')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.imagedep =e.target.files[0].name;
 },
 getSocietes(){
 this.axios.get('http://localhost:8000/api/societes').then(res =>
{
 this.Societes = res.data;
 }).catch(error => {
 console.log(error)
 });
 }

 },
 created() {
 this.getSocietes();
 }
}
</script>
<style lang="">

</style>
