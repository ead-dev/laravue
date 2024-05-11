<template>
    <main id="main" class="scrolled-offset">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Accueil</a></li>
          <li>Tableau de bord</li>
        </ol>
        <h2>DONNEES ENVIRONNEMENTALES</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="section-title">
            <h2>TABLEAU DE BORD DES DONNEES ENVIRONNEMENTALES </h2>
            <p>Explorez notre tableau de bord vous permettra de visualiser et d'analyser l’évolution
                l'impact environnemental du secteur numérique au Congo à travers des indicateurs clés.</p>
          </div>
      <div class="container">
        <hr/>
        <div class="section-title">
            <h5 class="text-center">consommation d'électricité en Kwh</h5>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div style="width: 500px; margin:5px auto;"><canvas id="elec"></canvas></div>
            </div>
        </div>
        <hr/>
        <div class="section-title">
            <h5 class="text-center">Consommation eau en m3</h5>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div style="width: 500px; margin:5px auto;"><canvas id="eau"></canvas></div>
            </div>
        </div>
        <hr/>
        <div class="section-title">
            <h5 class="text-center">Emission de Gaz à effet de serre en KtCO2e</h5>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div style="width: 500px; margin:5px auto;"><canvas id="ges"></canvas></div>
            </div>
        </div>

        <hr/>
        <div class="section-title">
            <h5 class="text-center">Repartition des sources d'energie</h5>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-center" style="width: 320px; margin:5px auto"><canvas id="source"></canvas></div>
            </div>
        </div>

      </div>
    </section><!-- End Services Section -->


            <!-- ======= Clients Section ======= -->
            <section id="clients" class="clients">
            <div class="container">

                <div class="section-title">
                    <h2>ENTREPRISES PARTENAIRES</h2>
                    <p>Découvrez nos précieux partenaires du secteur numérique qui collaborent activement avec
                    l'Observatoire du Numérique Soutenable pour promouvoir des pratiques durables et
                    contribuer à la préservation de l'environnement. </p>
                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                    <div v-for="src in srcs" class="swiper-slide"><img :src=src class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            </div>
        </section><!-- End Clients Section -->
  </main><!-- End #main -->
</template>

<script>
    import '../../libs/chart.min.js';
    import '../../libs/jquery.min.js';
    import Swiper from 'swiper/bundle';
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';

    export default{
        name: 'Impact',
        data(){
            return{
                srcs:[]
            }
        },
        methods:{
            load(){
                $.ajax({
            url:'/api/data',
            type:'get',
            dataType:'json',
            success:function(secs){
                //console.log(Object.keys(secs.sec1));
                var arr1 = Object.entries(secs.elec);
                const lab1 = arr1.map((el)=>el[1].annee)
                const dat1 = arr1.map((el)=>el[1].valeur)
                var arr2 = Object.entries(secs.eau);
                const lab2 = arr2.map((el)=>el[1].annee)
                const dat2 = arr2.map((el)=>el[1].valeur)
                const arr3 = Object.entries(secs.ges);
                const lab3 = arr3.map((el)=>el[1].annee)
                const dat3 = arr3.map((el)=>el[1].valeur);
                const dat4 = [secs.source.e2c,secs.source.ge,secs.source.er]
                const lab4 = ['E2C - '+secs.source.e2c+'%','GE - '+secs.source.ge+'%','RENOUVELABLE - '+secs.source.er+'%']
                console.log(dat4);

               // var l1 = Object.keys(secs.sec1);
               // var d1 = Object.values(secs.sec1);

                new Chart(
                    document.getElementById('elec'),
                    {
                    type: 'line',
                    options: {
                        animation: false,
                        plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                        }
                    },
                    data: {
                        labels: lab1,
                        datasets: [
                        {
                            label: 'Consommation electrique',
                            data: dat1,
                            borderColor: '#3d9970',
                        }
                        ]
                    }
                    }
                );
                new Chart(
                    document.getElementById('eau'),
                    {
                    type: 'bar',
                    options: {
                        animation: false,
                        plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                        }
                    },
                    data: {
                        labels: lab2,
                        datasets: [
                        {
                            label: 'Consommation d\'eau',
                            data: dat2,
                            backgroundColor: '#3d9970',
                        }
                        ]
                    }
                    }
                );
                new Chart(
                    document.getElementById('ges'),
                    {
                    type: 'line',
                    options: {
                        animation: false,
                        plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                        }
                    },
                    data: {
                        labels: lab3,
                        datasets: [
                        {
                            label: 'Gaz a effet de serre',
                            data: dat3,
                            borderColor: '#3d9970',
                        }
                        ]
                    }
                    }
                );
                new Chart(
                    document.getElementById('source'),
                    {
                    type: 'pie',
                    options: {
                        animation: false,
                        plugins: {
                        legend: {
                            display: true,
                            position:'top',
                        },
                        tooltip: {
                            enabled: true
                        }
                        }
                    },
                    data: {
                        labels: lab4,
                        datasets: [
                        {
                            label: 'Repartition',
                            data: dat4,
                            //borderColor: '#3d9970',
                            backgroundColor: ['#3080d0','#c11b1b','#3d9970'],
                        }
                        ]
                    }
                    }
                );

              },
            error:function(err){
                console.log(err);
            }
        });
            },
            loadSrcs(){
                this.srcs=[
                    'assets/img/clients/client-1.png',
                    'assets/img/clients/client-2.png',
                    'assets/img/clients/client-3.png',
                    'assets/img/clients/client-4.png',
                    'assets/img/clients/client-5.png',
                    'assets/img/clients/client-6.png',
                    'assets/img/clients/client-7.png',
                    'assets/img/clients/client-8.png',
                ]
            },
            intClients(){
                new Swiper('.clients-slider', {
                    speed: 400,
                    loop: true,
                    autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                    },
                    slidesPerView: 'auto',
                    pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true
                    },
                    breakpoints: {
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 40
                    },
                    480: {
                        slidesPerView: 3,
                        spaceBetween: 60
                    },
                    640: {
                        slidesPerView: 4,
                        spaceBetween: 80
                    },
                    992: {
                        slidesPerView: 6,
                        spaceBetween: 120
                    }
                    }
                });
            }
        },
        mounted(){
            this.load();
            this.loadSrcs();
            this.intClients();
        }
    }

</script>
