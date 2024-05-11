<template>
<div id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">ACCUEIL</a></li>
            <li>DATACENTERS</li>
          </ol>
          <h2>CENTRES DE DONNEES</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <div class="p-4">
        <div class="">
            <div class="">
                <div class="m-2">
                    <div class=""><button @click="showModal"  class="btn btn-xs btn-success"><i class="bx bxs-add-to-queue" title="Ajouter un datacenter"></i> Ajouter</button></div>
                </div>
                <div class="table-responsive mt-5">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>NOM</th>
                                    <th>MISE EN SERVICE</th>
                                    <th>PROPRIETAIRE</th>
                                    <th>OPERATEUR</th>
                                    <th>COMMUNE</th>
                                    <th></th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr v-for="dc in centers">
                                    <td>{{ dc.name }}</td>
                                    <td>{{ dc.start }}</td>
                                    <td>{{ dc.owner }}</td>
                                    <td>{{ dc.operateur }}</td>
                                    <td>{{ dc.commune }}</td>
                                    <td></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </div>
</div>
<Modal v-show="isModalVisible" @close="closeModal">
            <template v-slot:header>
                <h4>NOUVEAU DATACENTER</h4>
            </template>
            <template v-slot:body>
                <form @submit.prevent="save()">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <input type="text" v-model="centre.name" required placeholder="Intitule" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mt-3">
                        <div class="form-group">
                            <input type="date" v-model="centre.start" required placeholder="Date de mise en service" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <input type="text" v-model="centre.owner" required placeholder="Proprietaire des donnees" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <input type="text" v-model="centre.operateur" required placeholder="Operateur du centre" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <select @change="comChange($event)" name="datacenter_id" id="" required class="form-control">
                            <option value="">Commune ...</option>
                                <option v-for="opt in communes" :value="opt.id">{{ opt.name }}</option>
                        </select>
                    </div>
                    <div>
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
                centers:[],
                communes:[],
                centre:{},
                isModalVisible:false,
                toaster: createToaster({ position:'top-right'}),
            }
        },
        methods:{
            setData(data){
                this.centers = data.centers;
                this.communes = data.communes;
            },
            async save(){
                await axios.post('/api/datacenters',this.centre)
                        .then((res)=>this.reload())
                        .catch((err)=>this.toaster.error("Echec !!"))
            },
            async load(){
                await axios.get('/api/datacenters')
                        .then((res)=>this.setData(res.data))
                        .catch((err)=>console.log(err))
            },
            comChange(event){
                this.centre.commune_id = event.target.value
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
           this.load().then(()=>console.log(this.centers.length))

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
</style>
