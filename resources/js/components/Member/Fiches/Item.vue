<template>
    <div class="col-md-3 col-sm-12">
        <router-link
      :to="{
        name:'fiche', params: {tkn: token}}">
            <div class="card p-1">
                <div class="card-body justify-content-center align-self-center">
                    <div>{{ annee }}</div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
    export default{
        name:'Item',
        props:[
            'annee',
            'token'
        ]
    }
</script>
