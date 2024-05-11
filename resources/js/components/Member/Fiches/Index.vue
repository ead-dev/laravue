<template>
        <div id="main">

        <div style="min-height:300px; overflow: scroll;" class="mt-4 p-2">
                <div class="p-1" style="margin-left: 100px;">
                    <div class=""><router-link class="btn btn-xs btn-success" to="/fiche/create"><i class="fa fa-edit" title="Ajouter une fiche"></i>Remplir une fiche</router-link></div>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <Item v-for="fiche in fiches" :annee="fiche.annee" :token='fiche.token' :key="fiche.id" ></Item>
                    </div>
                </div>
        </div>
    </div>
</template>
<script>
    import Item from './Item.vue'
    import axios from "axios";
    export default{
        name:'FichesIndex',
        data(){
            return{
                fiches:[]
            }
        },
        components:{
            Item,
        },
        methods:{
            async load(){
                await axios.get('/api/fiches')
                        .then((res)=>this.fiches = res.data)
                        .catch((err)=>console.log(err))
            },
            getLength(data){
                return data.length;
            },
        },

        mounted(){
           this.load().then(()=>console.log(this.fiches.length))

        }

    }

</script>
