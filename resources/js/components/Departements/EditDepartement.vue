<template lang="">

<form @submit.prevent="modifierDepartement">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="Departements.nomdepartement">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"
:files="'../storage/images/'+Departements.imagedep"/>
</div>
 <div class="form-group">
 Catégories<select class="form-control" v-model="Departements.societeID">

 <option v-for="c in Societes" :key="c.id"
:value=c.id>{{c.nomsociete}}</option>
 </select>
 </div>
 <button type="submit" class="btn btn-block btn-primary">Modifier Departement</button>
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
 Departements:[],
 Societes:[]
 }
 },
 methods: {

 modifierDepartement(){
 const depar = {
 nomdepartement:this.Departements.nomdepartement,
 imagedep:this.Departements.imagedep,
 societeID:this.Departements.societeID
 }
 this.axios.put(`http://localhost:8000/api/departements/${this.$route.params.id}`,depar)
 .then(() => {
 this.$router.push('/departements')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.Departements.imagedep =e.target.files[0].name;
 },
 getSocietes(){
 this.axios.get('http://localhost:8000/api/societes').then(res =>
{
 this.Societes = res.data;
 }).catch(error => {
 console.log(error)
 });
 },

 getOneDepartement(){
 this.axios
 .get(`http://localhost:8000/api/departements/${this.$route.params.id}`)
 .then((res) => {
 this.Departements = res.data;
 console.log(this.Departements)
 });
 }

 },
 created() {
 this.getSocietes();
 this.getOneDepartement();
 }
}
</script>
<style lang="">

</style>