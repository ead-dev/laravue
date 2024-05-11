<template>
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <carousel :items-to-show="1" :wrapAround="true" :autoplay="5000">
                    <slide v-for="slide in 10" :key="slide" >
                        <div class="carousel-item" :class="setActive(slide)">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>{{ slide }}</span></h2>
                                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                                </div>
                            </div>
                        </div>
                    </slide>

                    <template #addons>
                    <navigation />
                    <pagination />
                    </template>
                </carousel>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    import 'vue3-carousel/dist/carousel.css'
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

    export default {
    name: 'MyCarousel',
    methods:{
        setActive(key){
            if(key==1){
                return 'active';
            }
            return '';
        }
    },
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    }
    }
</script>

<style scoped>

</style>
