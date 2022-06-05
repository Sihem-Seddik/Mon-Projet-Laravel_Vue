import { createRouter,createWebHashHistory } from 'vue-router'
import Home from "./Home";
import AllSocietes from "./components/Societes/AllSocietes"; 
import AddSociete from "./components/Societes/AddSociete"; 
import EditSociete from "./components/Societes/EditSociete"; 
import AllDepartements from "./components/Departements/AllDepartements"; 
import AddDepartement from "./components/Departements/AddDepartement"; 
import EditDepartement from "./components/Departements/EditDepartement"; 
import AllEmployes from "./components/Employes/AllEmployes"; 
import AddEmploye from "./components/Employes/AddEmploye"; 
import EditEmploye from "./components/Employes/EditEmploye"; 
import Register from './components/Authentification/Register.vue';
import Login from './components/Authentification/Login.vue';
import Profile from './components/Authentification/Profile.vue'; 
import Logout from './components/Authentification/Logout.vue'; 

const routes = [
    {
        name: 'logout',
        path: '/logout',
        component: Logout
        }, 
    {
        name: 'register',
        path: '/register',
        component: Register
        },
        {
        name: 'login',
        path: '/login',
        component: Login
        },
        {
        name: 'profile',
        path: '/profile',
        component: Profile
        }, 
    {
        path: '/editEmploye',
        name: 'editEmploye',
        component: EditEmploye
        }, 
    {
        path: '/addEmploye',
        name: 'addEmploye',
        component: AddEmploye
        }, 
    {
        path: '/employes',
        name: 'employes',
        component: AllEmployes
        }, 
       
    {
        path: '/editDepartement',
        name: 'editDepartement',
        component: EditDepartement
        }, 
    {
        path: '/addDepartements',
        name: 'addDepartements',
        component: AddDepartement
        }, 
    {
        path: '/departements',
        name: 'departements',
        component: AllDepartements
        }, 
    {
        path: '/editSociete',
        name: 'editSociete',
        component: EditSociete
        } 
,       
    {
        path: '/addSociete',
        name: 'addSociete',
        component: AddSociete
        },
 {
 path: '/',
 name: 'home',
 component: Home
 },
 {
 path: '/societes',
 name: 'societes',
 component: AllSocietes
 } 
 ];
const router = createRouter({
 history: createWebHashHistory(),
 routes
 })

export default router