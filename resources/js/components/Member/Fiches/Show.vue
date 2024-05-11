<template>
    <div v-if="entreprise.secteur_id==1"  id="main" class="scrolled-offset">
        <div class="container">
            <div class="m-5">
                <div style="max-width: 700px; margin:10px auto;" class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="section-title">
                                <h5>FICHE DE COLLECTE DE DONNEES {{ fiche.annee }}</h5>
                            </div>

                            <h4 class="text-bold">I  - Emissions de GES et consommations énergétiques des opérateurs de communications électroniques</h4>
                            <h6 class="text-bold mt-4 mb-4">I.1 Emissions de GES</h6>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>Ensemble des émissions  de gaz à effet de serre au Congo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Groupe electrogène (temps de fonctionnement et Puissance)</td>
                                        <td>{{ fiche.ges_ge }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fabrication des réseaux (données supplémentaires en annexe) </td>
                                        <td>{{ fiche.ges_reseaux }}</td>
                                    </tr>
                                    <tr>
                                        <td>Construction de l'infrastructure des réseaux (données supplémentaires en annexe) </td>
                                        <td>{{ fiche.ges_infra }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h6 class="text-bold mt-4 mb-4">I.2 Consommation énergétique</h6>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>Consommation  énergétique totale en GWh</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Consommation énergétique des réseaux</td>
                                        <td><span class="text-bold text-success">{{ fiche.conso_reseaux }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Consommation énergétique des data centers</td>
                                        <td><span class="text-bold">{{ fiche.conso_dc }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Consommation énergétique des box internet et décodeurs</td>
                                        <td><span class="text-bold">{{ fiche.conso_box }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Autres consommations énergétiques</td>
                                        <td><span class="text-bold">{{ fiche.conso_autres }}</span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4 class="bg-light mt-4 mb-4">II  - Equipement et ventes de téléphones mobiles</h4>
                            <h6 class="bg-light mb-4">II.1 Equipement et ventes de téléphones mobiles</h6>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>Téléphones mobiles  en service</th>
                                        <th>Parc grand public</th>
                                        <th>Parc entreprise</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>dont achetés neufs</td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_achat_new_public }}</span></td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_achat_new_private }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>dont achetés reconditionnés</td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_achat_old_public }}</span></td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_achat_old_private }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>Ventes de téléphones mobiles</th>
                                        <th>Parc grand public</th>
                                        <th>Parc entreprise</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>dont vendus neufs</td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_vente_new_public }}</span></td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_vente_new_private }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>dont vendus reconditionnés</td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_vente_old_public }}</span></td>
                                        <td><span class="text-bold">{{ fiche.equip_phone_vente_old_private }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
    <div v-if="entreprise.secteur_id==3" id="main" class="scrolled-offset">
        <div class="container">
            <div class="m-5">
                <div style="max-width: 700px; margin:10px auto;" class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="section-title">
                                <h5>FICHE DE COLLECTE DE DONNEES {{ fiche.annee }}</h5>
                            </div>

                            <h4 class="text-bold">I  - Emissions de GES et consommations énergétiques des opérateurs de communications électroniques</h4>
                            <h6 class="text-bold mt-4 mb-4">I.1 Emissions de GES</h6>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th>Ensemble des émissions  de gaz à effet de serre au Congo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Groupe electrogène (temps de fonctionnement et Puissance)</td>
                                        <td>{{ fiche.ges_ge }}</td>
                                    </tr>
                                    <tr>
                                        <td>Equipement des datacenters (données supplémentaires en annexe)</td>
                                        <td>{{ fiche.ges_equip_dc }}</td>
                                    </tr>
                                    <tr>
                                        <td>Construction de l'infrastructure des réseaux (données supplémentaires en annexe) </td>
                                        <td>{{ fiche.ges_infra }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <h4 class="bg-light text-dark">Données caractéristiques des centres de données</h4>
                            <div>
                                <div>
                                    <div class=""><button @click="showModal" class="btn btn-xs btn-success"><i class="bx bxs-add-to-queue" title="Lier un datacenter"></i> Renseigner un datacenter</button></div>
                                </div>
                                <hr/>
                                <table class="table table-sm table-bordered table-hover">
                                    <thead class="table-success">
                                        <tr>
                                            <td>DATACENTER</td>
                                            <td>COMMUNE</td>
                                            <td>Conso. élec. annuelle</td>
                                            <td>Conso. élec. annuelle des équip. info.</td>
                                            <td>Vol. d'eau annuel entrant</td>
                                            <td>Vol. d'eau annuel sortant</td>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr v-for="d in fiche.df">
                                                <td>{{ d.datacenter.name }}</td>
                                                <td>{{ d.datacenter.commune?d.datacenter.commune.name:'-' }}</td>
                                                <td>{{ d.conso_elec_dc }} GWh</td>
                                                <td>{{ d.conso_elec_equip }} GWh</td>
                                                <td>{{ d.vol_eau_entrant }} m3</td>
                                                <td>{{ d.vol_eau_sortant }} m3</td>
                                                <td><span title="Supprimer" style="cursor: pointer;" @click="removeDf(d.id)"><i class="bx bxs-trash"></i></span></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal v-show="isModalVisible" @close="closeModal">
            <template v-slot:header>
                <h4>Renseigner les données caractéristiques du centre de données</h4>
            </template>
            <template v-slot:body>
                <form @submit.prevent="saveDf()">
                <div class="form-group">
                    <select @change="dcChange($event)" name="datacenter_id" id="" required class="form-control">
                        <option value="">Datacenter ...</option>
                            <option v-for="opt in datacenters" :value="opt.id">{{ opt.name }}</option>
                    </select>
                </div>
                    <fieldset>
                        <legend>Consommation électrique</legend>
                        <div class="form-group mt-2">
                            <input type="text" v-model="df.conso_elec_dc" placeholder="Consommation électrique annuelle du centre de données (GWh)" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" v-model="df.conso_elec_equip" placeholder="Consommation électrique annuelle des équipements informatiques du centre de données (GWh)" class="form-control">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Consommation d'eau</legend>
                        <div class="form-group mt-2">
                            <input type="text" v-model="df.vol_eau_entrant" placeholder="Volume d'eau annuel entrant dans le centre de données (total en m3)" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" v-model="df.vol_eau_sortant" placeholder="Volume d'eau annuel sortant dans le centre de données (total en m3)" class="form-control">
                        </div>
                    </fieldset>
                    <div>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </template>

            <template v-slot:footer>
                <div></div>
            </template>
        </Modal>
    </div>
</template>
<script>
    import axios from "axios";
    import '../../../libs/jquery.min.js';
    import Modal from '../../Layout/Modal.vue';
    import { createToaster } from "@meforma/vue-toaster";
    export default{
        props: ['tkn'],
        name:'Show',

        components:{
            Modal,
        },
        setup() {
            function userDetailSubmitted(name) {
            console.log({ name });
            }

            return {
                userDetailSubmitted
            }
        },
        data(){
            return{
                user:this.$store.state.auth.user,
                entreprise:this.$store.state.auth.entreprise,
                fiche:{},
                datacenters:[],
                df:{

                },
                isModalVisible:false,
                toaster: createToaster({ position:'top-right'}),
            }
        },
        methods:{
            setData(data){
                this.fiche=data.fiche;
                this.datacenters = data.datacenters;
            },
            async saveDf(){
                this.df.token = this.fiche.token;

                console.log(this.df);
                await axios.post('/api/fiche/df',this.df)
                        .then((res)=>this.reload())
                        .catch((err)=>this.toaster.error("Echec !!"))
            },
            dcChange(event){
                //console.log(event.target.value)
                this.df.datacenter_id = event.target.value
            },
            async removeDf(id){
                await axios.post('/api/fiche/rdf',{_id:id})
                        .then((res)=>this.reload())
                        .catch((err)=>this.toaster.error("Une erreur est survenue lors de la suppression!!!"))
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
           async load(){
                await axios.get('/api/fiche/'+this.tkn)
                        .then((res)=>this.setData(res.data))
                        .catch((err)=>console.log(err))
            }
        },
        mounted(){
            this.load();
        }
    }
</script>
