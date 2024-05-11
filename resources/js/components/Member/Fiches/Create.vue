<template>
    <div v-if="entreprise.secteur_id==1" id="main" class="scrolled-offset">
        <div class="container">
            <div class="m-5">
                <form @submit.prevent="submit" method="POST">
                    <div class="">
                      <div style="max-width: 600px; margin:10px auto;" class="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="section-title">
                                        <h5>FORMULE DE COLLECTE DE DONNEES</h5>
                                    </div>
                                    <input type="hidden" v-model="fiche.secteur_id">
                                    <div class="form-group">
                                        <input type="number" required v-model="fiche.annee" placeholder="Annee" class="form-control">
                                    </div>
                                    <fieldset>
                                        <legend>Emissions de GES</legend>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.ges_ge" placeholder="Groupe electrogène (temps de fonctionnement et Puissance)" class="form-control">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.ges_reseaux" placeholder="Fabrication des réseaux (données supplémentaires en annexe)" class="form-control">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.ges_infra" placeholder="Construction de l'infrastructure des réseaux (données supplémentaires en annexe)" class="form-control">
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Consommation énergétique</legend>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.conso_reseaux" placeholder="Consommation énergétique des réseaux" class="form-control">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.conso_dc" placeholder="Consommation énergétique des data centers" class="form-control">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.conso_box" placeholder="Consommation énergétique des box internet et décodeurs" class="form-control">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.conso_autres" placeholder="Autres consommations énergétiques" class="form-control">
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Equipement et ventes de téléphones mobiles</legend>
                                        <fieldset>
                                            <legend>Téléphones mobiles en service</legend>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_achat_new_public" placeholder="achetés neufs - Parc grand public" class="form-control">
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_achat_new_private" placeholder="achetés neufs - Parc Entreprise" class="form-control">
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_achat_old_public" placeholder="achetés reconditionnés - Parc grand public" class="form-control">
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_achat_old_private" placeholder="achetés reconditionnés - Parc Entreprise" class="form-control">
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Ventes de téléphones mobiles</legend>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_vente_new_public" placeholder="vendus neufs - Parc grand public" class="form-control">
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_vente_new_private" placeholder="vendus neufs - Parc Entreprise" class="form-control">
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_vente_old_public" placeholder="vendus reconditionnés - Parc grand public" class="form-control">
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="text" required v-model="fiche.equip_phone_vente_old_private" placeholder="vendus reconditionnés - Parc Entreprise" class="form-control">
                                            </div>
                                        </fieldset>
                                    </fieldset>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                      </div>
                                </div>
                            </div>
                      </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div v-if="entreprise.secteur_id==3" id="main" class="scrolled-offset">
        <div class="container">
            <div class="m-5">
                <form method="POST" @submit.prevent="submit" >
                    <div class="modal-body">
                      <div style="max-width: 600px; margin:10px auto;" class="">
                            <div class="card">
                                <div class="card-body">
                                    <div class="section-title">
                                        <h5>FORMULE DE COLLECTE DE DONNEES</h5>
                                    </div>
                                    <input type="hidden" v-model="fiche.secteur_id">
                                    <div class="form-group">
                                        <input type="number" required v-model="fiche.annee" placeholder="Annee" class="form-control">
                                    </div>
                                    <fieldset>
                                        <legend>Emissions de GES</legend>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.ges_ge" placeholder="Groupe electrogène (temps de fonctionnement et Puissance)" class="form-control">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.ges_equip_dc" placeholder="Equipement des datacenters (données supplémentaires en annexe)" class="form-control">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" required v-model="fiche.ges_infra" placeholder="Construction de l'infrastructure des réseaux (données supplémentaires en annexe)" class="form-control">
                                        </div>
                                    </fieldset>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                      </div>
                                </div>
                            </div>
                      </div>
                    </div>

                    </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default{
        name:'Create',
        data:function(){
            return {
                user:this.$store.state.auth.user,
                entreprise:this.$store.state.auth.entreprise,
                fiche:{
                    secteur_id:this.$store.state.auth.entreprise.secteur_id,
                }
            }
        },
        methods:{
            async submit(){
                console.log(this.fiche)
                await axios.post('/api/fiche',this.fiche).then((res)=>this.$router.push({'name':'fiche','params': {'tkn': res.data.token}}))
            }
        }
    }
</script>
