<template lang="">

<form @submit.prevent="ajouterSociete">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="nomsociete">
 </div>
 <div class="form-group">
      <FilePond max-files="1" @change="onFileChange"/>

</div>

 <button type="submit" class="btn btn-block btn-primary">Ajouter
Societe</button>
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
 nomsociete: "",
 imagesociete: "",
 }
 },
 methods: {

 ajouterSociete(){
 const soci = {
 nomsociete:this.nomsociete,
 imagesociete:this.imagesociete
 }
 this.axios.post("http://localhost:8000/api/societes",soci)
 .then(() => {
 this.$router.push('/societes')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
     console.log(e.target.files[0].name);
 this.imagesociete =e.target.files[0].name;
 }
 }
}
</script>
<style lang="">

</style>
