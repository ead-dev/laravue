<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="">
                        <img height="160" src="assets/img/logo.png" alt="">
                    </a>
                    </div>
                <p class="login-box-msg" style="color:#3d9970">Se connecter pour entrer dans votre espace</p>

                <form action="javascript:void(0)" class="row" method="post">
                    <div class="col-12" v-if="Object.keys(validationErrors).length > 0">
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <li v-for="(value, key) in validationErrors" :key="key">{{ value[0] }}</li>
                            </ul>
                        </div>
                    </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" v-model="auth.email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" v-model="auth.password" name="password" class="form-control" placeholder="Mot de passe">
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                        Se rappeler de moi
                        </label>
                    </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                    <button :disabled="processing" @click="login" type="submit" style="background: #3d9970; color: white" class="btn btn-block">{{ processing?'Connexion ...':'Se connecter' }}</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>


            </div>
            <!-- /.login-card-body -->
            </div>
        </div>
    </div>

</template>
<script>
import { mapActions, mapState } from 'vuex'
export default {
    name:"Login",
    data(){
        return {
            auth:{
                email:"",
                password:""
            },
            user:{},
            validationErrors:{},
            processing:false
        }
    },
    mounted(){
        console.log(this.$store.state.auth.authenticated);
    },

    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async login(){
            this.processing = true
            await this.$store.dispatch('auth/login', this.auth).then((data)=>{
                this.$emit('updauth',this.$store.state.auth.user);
            })
            this.$emit('toggle');
            this.processing = false;
            //this.$emit('updauth',$evt,true);
            window.location.reload();
            //this.$router.push({name:'dashboard'})
        },
        /*
        async login(){
            this.processing = true
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/login',this.auth).then(({data})=>{
                //console.log(data);
                //this.user = data
                //this.$emit('update-user',$event,this.$store.state.auth.user)
                this.signIn()
                //this.$router.push({name:'dashboard'});

            }).catch(({response})=>{
                //alert(error);
               if(response.status===422){
                    this.validationErrors = response.data.errors
                }else{
                    this.validationErrors = {}
                    alert(response.data.message)
                }
            }).finally(()=>{
                this.processing = false
            })
        }, */
    }
}
</script>

<style scoped src='@/assets/dist/css/adminlte.css'>

</style>
