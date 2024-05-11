<template>
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
          <h1><router-link to="/">Synapps</router-link></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><router-link to="/">Accueil</router-link></li>
            <li><router-link to="/about">About</router-link></li>
            <li><router-link to="/service">Services</router-link></li>
            <li><router-link to="/portfolio">Portfolio</router-link></li>
            <li><router-link to="/team">Team</router-link></li>
            <li><router-link to="/pricing">Pricing</router-link></li>
            <li><router-link to="/blog">Blog</router-link></li>

            
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
</template>

<script>
    export default {
      name: 'Header'
    }
</script>

<style scoped>
    .navbar a:hover, .navbar .active, .navbar .router-link-exact-active {
  color: #3d9970;
}
</style>

