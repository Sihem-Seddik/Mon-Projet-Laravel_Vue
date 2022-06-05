<template lang="">

<form @submit.prevent="modifierSociete">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="Societe.nomsociete">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"
:files="'../storage/images/'+Societe.imagesociete"/>
</div>

 <button type="submit" class="btn btn-block btn-primary">Modifier Societé</button>
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
 Societe:[]
 }
 },
 mounted (){
 this.getOneSociete() ;
 },
 methods: {

 modifierSociete(){
 const soc = {
 nomsociete:this.Societe.nomsociete,
 imagesociete:this.Societe.imagesociete
 }
 this.axios.put(`http://localhost:8000/api/societes/${this.$route.params.id}`,soc)
 .then(() => {
 this.$router.push('/societes')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.Societe.imagesociete =e.target.files[0].name;
 },
 getOneSociete(){
 this.axios
 .get(`http://localhost:8000/api/societes/${this.$route.params.id}`)
 .then((res) => {
 this.Societe= res.data;
 });
 }
 }
}
</script>
<style lang="">

</style>