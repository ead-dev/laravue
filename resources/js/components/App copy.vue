<template>
    <div id="app">
      <Layout>
        <Slider/>
        <h1>Premier page</h1>
      </Layout>
    </div>
  </template>

  <script>
  //import HelloWorld from './components/HelloWorld.vue'
  import Layout from './Layout/Layout.vue'
  import Slider from './Front/Slider.vue'

  export default {
    name: 'App',
    components: {
      Layout,
      Slider,
    }
  }
  </script>
