<template>
 <!-- Nav bar -->
 <nav class="navbar navbar-dark bg-dark justify-content-between flex-nowrap
flex-row">
 <div class="container">
 <a class="navbar-brand float-left">Projet</a>
 <a class="navbar-brand float-left">
 <router-link class="nav-link navbar-brand pr-3" to="/register">
 Authentification
 </router-link>
 </a>
<a class="navbar-brand float-left">
 <router-link class="nav-link" to="/logout"> Logout </router-link>
 </a>

 <ul class="nav navbar-nav flex-row float-right">
     <strong>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand
 pr-3" to="/"> Home </router-link>
 </li></strong>
 <strong>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3" to="/addSociete"> Ajout
Societe </router-link>
 </li></strong>
 <strong>
 <li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/societes"> Societés </router-link>
</li></strong>
<strong>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/departements"> Departements </router-link>
 </li></strong>
 <strong>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/addDepartements"> Ajout Departement </router-link>
 </li>
 </strong>
 <strong>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/employes"> Employes </router-link>
 </li></strong>
 <strong><li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3" to="/addEmploye">
Ajout Employe </router-link>
 </li></strong>
 </ul>
 </div>
 </nav>
</template>

<script>
 export default {}
</script>