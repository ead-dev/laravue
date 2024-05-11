<template>
    <Header />
    <router-view></router-view>
    <div id="content">
        <slot />
    </div>
    <Footer />
</template>

<script>
import Header from './Header/Header.vue'
import Footer from './Footer/Footer.vue'

export default {
  name: 'Layout',
  components: {
    Header,
    Footer
  }
}
</script>

<style scoped>
    #content{
        min-height: 200px;
    }
</style>
