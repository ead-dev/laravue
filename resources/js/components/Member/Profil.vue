<template>
    <div id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section  id="breadcrumbs" class="breadcrumbs">
            <div class="container">

              <ol>
                <li><a href="/">ACCUEIL</a></li>
                <li>Profil</li>
              </ol>
              <h2>{{ entreprise.name }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->
        <div class="container">
            <div class="m-5">
                <form method="POST" @submit.prevent="submit" >
                    <div class="">
                      <div class="row">
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <div class="form-group">
                                    <label for="">ENTREPRISE</label>
                                    <input type="text" name="name" v-model="donnees.entreprise.name"  required placeholder="Nom" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">TELEPHONE</label>
                                    <input type="text" name="phone" v-model="donnees.entreprise.phone" required placeholder="Telephone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" v-model="donnees.entreprise.email" required placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">LOGO </label>
                                    <input type="file" name="logo" placeholder="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <fieldset>
                                    <legend>Compte utilisateur</legend>
                                    <div class="form-group">
                                        <label for="">NOM</label>
                                        <input type="text" name="user_name" v-model="donnees.user.name"  required placeholder="Nom de l'administrateur" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">TELEPHONE</label>
                                        <input type="text" name="user_phone" v-model="donnees.user.phone"  placeholder="Numero de telephone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">EMAIL</label>
                                        <input type="email" name="user_email" v-model="donnees.user.email" required placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">MOT DE PASSE</label>
                                        <input type="password" name="password" v-model="donnees.user.password" required placeholder="Mot de passe" class="form-control">
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                      </div>
                    </div>
                    <div class="mt-4">
                      <button :disabled="processing" type="submit" class="btn btn-success">{{ processing?'Engistrement ...':'Enregistrer' }}</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {mapActions} from 'vuex'
export default {
    name:"Profil",
    data(){
        return {
            user:this.$store.state.auth.user,
            entreprise:this.$store.state.auth.entreprise,
            donnees:{
                user:{
                    name:'',
                    phone:'',
                    email:'',
                    password:null
                },
                entreprise:{
                    name:'',
                    phone:'',
                    email:'',
                    logo:null
                },
            },
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signOut:"auth/signOut"
        }),
        async logout(){
            await axios.post('/api/logout').then((data)=>
                this.signOut().then((res)=>window.location.href='/')
            )
        },
        async submit(){
            this.processing = true;
            console.log(this.donnees)
            await axios.post('/api/profil',this.donnees)
            .then((res)=>this.logout())
            .catch((err)=>console.log(err))
            .finally(()=>this.processing = false);
        }
    },
    mounted(){
        this.donnees.entreprise.name = this.entreprise.name;
        this.donnees.entreprise.email = this.entreprise.email;
        this.donnees.entreprise.phone = this.entreprise.phone;
        this.donnees.user.name = this.user.name;
        this.donnees.user.phone = this.user.phone;
        this.donnees.user.email = this.user.email;

    }

}
</script>

<style scoped>
    fieldset{
    padding: 15px;
    border: 1px #b9b9b9 solid;
    border-radius: 5px;
    margin: 10px 0;
}

legend{
    font-weight: 700;
    font-size: 11px;
    font-family: "segoe UI", "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #000000;
    padding: 5px;
    width: auto;
    float: none;
}
</style>
