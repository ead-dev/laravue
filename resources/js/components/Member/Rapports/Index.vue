<template>
<div id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="/">ACCUEIL</a></li>
            <li>Rapports</li>
          </ol>
          <h2>Rapports</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <div style="max-height:300px; overflow: scroll;" class="">
        <div class="">
            <div class="p-3">
                <div class="m-2">
                    <div class=""><button @click="showModal" class="btn btn-xs btn-success"><i class="bx bxs-add-to-queue" title="Ajouter un rapport"></i> Ajouter un rapport</button></div>
                </div>
                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                        <tr>
                                <th>ANNEE</th>
                                <th>INTITULE</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                            <tr v-for="p in rapports">
                                <td>{{ p.annee }}</td>
                                <td><a rel="noreferrer noopener" target="_blank" :href="p.link"> {{ p.name }}</a></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<Modal v-show="isModalVisible" @close="closeModal">
    <template v-slot:header>
        <h4>NOUVEAU RAPPORT</h4>
    </template>
    <template v-slot:body>
        <form @submit.prevent="save()">
            <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" v-model="rapport.name" required placeholder="Intitule" class="form-control">
                  </div>
              </div>
              <div class="col-md-12 col-sm-12 mt-3">
                <div class="form-group">
                    <input type="number" v-model="rapport.annee" required placeholder="Annee" class="form-control">
                </div>
            </div>
              <div class="col-md-12 col-sm-12 mt-3">
                <div class="form-group">
                    <label for="">FICHIER PDF</label>
                    <input type="file" name="fichier_uri" required class="form-control">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    </template>
    <template v-slot:footer>
        <div></div>
    </template>
</Modal>
</template>
<script>
    import axios from "axios";
    import Modal from '../../Layout/Modal.vue';
    import { createToaster } from "@meforma/vue-toaster";
    export default{
        name:'DatacenterIndex',
        components:{
            Modal
        },
        data(){
            return{
                rapports:[],
                rapport:{},
                isModalVisible:false,
                toaster: createToaster({ position:'top-right'}),
            }
        },
        methods:{
            setData(data){
                this.rapports = data;
            },
            async save(){
                await axios.post('/api/rapports',this.rapport)
                        .then((res)=>this.reload())
                        .catch((err)=>this.toaster.error("Echec !!"))
            },
            async load(){
                await axios.get('/api/rapports')
                        .then((res)=>this.setData(res.data))
                        .catch((err)=>console.log(err))
            },
            closeModal(){
                this.isModalVisible = false;
            },
            showModal(){
                this.isModalVisible = true;
            },
            async reload(){
                this.toaster.success("Operation effectuee avec succes !!!");
                this.isModalVisible = false;
                await this.load();
            },
        },

        mounted(){
           this.load().then(()=>console.log(this.rapport.length))

        }

    }

</script>

<style scoped>
    .form-group{
        margin: 10px 2px;
    }
    footer.modal-footer{
        display: none;
    }
    .modal{
        height: 400px;
    }
    .breadcrumbs a{
        color: #3d9970;
        text-decoration: none;
    }
    a{
        color: #3d9970;
    }
</style>
