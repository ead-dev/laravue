<template>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="/">{{ entreprise.name  }}</a></li>
            <li>{{ user.name }}</li>
            </ol>
            <h2>ESPACE MEMBRE</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
        <div class="container">

            <div class="row">
                <div class="col-lg-3">
                    <div class="info-box mb-4">
                        <i class="bx bx-pencil"></i>
                        <p><router-link to="/profil">Editer le profil</router-link></p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="info-box mb-4">
                        <i class="bx bxs-report"></i>
                        <p><router-link to="/rapports">Gerer les rapports</router-link></p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="info-box mb-4">
                        <i class="bx bxs-file-doc"></i>
                        <p><router-link to="/fiches">Gerer les fiches</router-link></p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="info-box mb-4">
                        <i class="bx bx-power-off"></i>
                        <p><a class="dropdown-item" href="javascript:void(0)" @click="logout">Se deconnecter</a></p>
                    </div>
                </div>



            </div>


        </div>
        </section><!-- End Contact Section -->

        </main><!-- End #main -->
</template>

<script>
import Layout from '@/components/Layout/Layout.vue';
import {mapActions} from 'vuex'
export default {
    name:"Dashboard",
    components: {
        Layout,
    },
    data(){
        return {
            user:this.$store.state.auth.user,
            entreprise:this.$store.state.auth.entreprise,
        }
    },
    methods:{
        ...mapActions({
                signOut:"auth/signOut"
        }),
        async logout(){
            await axios.post('/api/logout').then((res)=>this.afterLogout())

        },
        async afterLogout(){
            await this.signOut()
                    .then((res)=>window.location.href='/')
        }
    }

}
</script>

<style scoped>
    a{
        color: #3d9970;
        text-decoration: none;
    }

</style>
