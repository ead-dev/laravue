<template>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </section>

    <!-- ======= Header ======= -->
    <header @updauth="onUpdateAuth" id="header" class="d-flex align-items-center">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
          <h1><router-link to="/">Synapps</router-link></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><router-link to="/">Accueil</router-link></li>
            <li><router-link to="/about">About</router-link></li>
            <li><router-link to="/data">Donnees environnementales</router-link></li>
            <li><router-link to="/blog">Publication</router-link></li>
            <li><router-link to="/contact">Contact</router-link></li>
            <div style="display: inherit;" v-if="authenticated">
            <li class="dropdown">
                <a class="">
                    <div class="text-center">
                        <i style="font-size:25px;" class="bi bi-person"></i>
                        <p><small>{{ user.name }}</small><i class="bi bi-chevron-down"></i></p>
                    </div>
                </a>
                <ul>
                    <li><a href="/account/profil">Profil</a></li>
                    <li><a href="/account/rapports">Rapports</a></li>
                    <li><a href="/account/fiches">Fiches</a></li>

                    <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Se deconnecter</a></li>
                </ul>
            </li>
            </div>
            <div style="display: inherit;" v-else>
                <li><router-link to="/login">Se connecter</router-link></li>
            </div>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
</template>

<script>
    import {mapActions} from 'vuex'
    import {computed} from 'vue'

    const loggedIn = computed({
        // getter
        get() {
            return this.$store.state.auth.authenticated
        },
        // setter
        set(newValue) {
            // Note: we are using destructuring assignment syntax here.
           // [firstName.value, lastName.value] = newValue.split(' ')
        }
    });

    export default {
        name: 'Header',
        data: function(){
            return {
                user:this.$store.state.auth.user,
                authenticated:this.$store.state.auth.authenticated,
                isLoggedIn: false,
                currentUser: null
            }
        },

        methods:{
            onUpdateAuth($evt){
                console.log("updated!");
                this.authenticated = !this.authenticated;
            },
            getAuthInfo() {
                this.isLoggedIn = this.$store.state.auth.authenticated;
                if (this.isLoggedIn) {
                    this.currentUser = this.$store.state.auth.user;
                }
            },
            ...mapActions({
                signOut:"auth/signOut"
            }),
            async logout(){
                await axios.post('/api/logout').then(({data})=>{
                    this.signOut()
                    //th.$emit('update-auth',$event);
                    this.authenticated = false;
                    this.$router.push({name:"home"})
                })
            }
        },
        mounted: function() {
          this.getAuthInfo();
        },
        updated: function() {
            this.getAuthInfo();
        }


    }
</script>

<style scoped>
    .navbar a:hover, .navbar .active, .navbar .router-link-exact-active {
        color: #3d9970;
    }
</style>

