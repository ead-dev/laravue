<template>
<section id="hero">
    <div class="hero-container">
        <div>
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div id="slide1" class="swiper-slide">
                        <div class="">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">Bienvenue à l'<span>Observatoire</span> du Numérique <span>Soutenable</span></h2>
                                    <p class="animate__animated animate__fadeInUp">Découvrez l'observatoire dédié à la mesure et à la réduction de l'empreinte carbone
                                        du secteur numérique au Congo. Explorez les données, les indicateurs et les initiatives pour
                                        un avenir numérique durable.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="slide2" class="swiper-slide">
                        <div  class="" style="background-image: url({{ asset('Eterna/assets/img/slide/slide-2.jpg')}})">
                            <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated fanimate__adeInDown">Agissez pour un <span>numérique responsable</span></h2>
                                <p class="animate__animated animate__fadeInUp">Découvrez comment vous pouvez contribuer à réduire l'empreinte carbone du
                                    numérique. Apprenez les bonnes pratiques, adoptez des technologies éco-responsables et
                                    participez à des initiatives pour un impact positif sur l'environnement.</p>

                            </div>
                            </div>
                        </div>
                    </div>
                    <div id="slide3" class="swiper-slide">
                        <div class="">
                                <div class="carousel-container">
                                    <div class="carousel-content">
                                        <h2 class="animate__animated animate__fadeInDown">Suivez les <span>progrès</span> et les <span>initiatives</span></h2>
                                        <p class="animate__animated animate__fadeInUp">Explorez notre tableau de bord interactif pour suivre les performances
                                            environnementales du secteur numérique au Congo.</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>
</section>

</template>

<script>
    import Swiper from 'swiper/bundle';
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';
    export default{
        name:'MySwiper',
        nethods:{
            load(){
                const swiper = new Swiper('.hero-container');
            }
        },
        mounted(){
            const swiper = new Swiper('.swiper',
                {
                    speed: 800,
                    loop: true,
                    autoplay: {
                        delay: 15000,
                        disableOnInteraction: false
                    },
                    slidesPerView: 'auto',
                    pagination: {
                        el: '.swiper-pagination',
                        type: 'bullets',
                        clickable: true
                    },
                      // Navigation arrows
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },

                }
            );
        }
    }

</script>

<style scoped>
    .swiper {
        width: 100%;
        height: 70vh;
    }

    .swiper-button-next, .swiper-button-prev{
        color:#3d9970;
    }
   div.swiper-pagination>span.swiper-pagination-bullet-active {
        opacity: var(--swiper-pagination-bullet-opacity, 1);
        background:#3d9970;
    }

    #slide1{
        background-image:url("./slide/slide-1.jpg")
    }

    #slide2{
        background-image:url("./slide/slide-2.jpg")
    }

    #slide3{
        background-image:url("./slide/slide-3.jpg")
    }

</style>
