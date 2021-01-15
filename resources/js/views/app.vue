<template>
<div id="app">
  <div style="height: 100%;">
    <vue-particles
      color="#ffffff"
      :particleSize="1"
      :linesWidth="2"
      :linesDistance="150"
      :lineOpacity="1000"
      :moveSpeed="6"
      :particlesNumber="80"
    ></vue-particles>
  </div>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">NavBar</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item href="#">About</b-nav-item>
          <b-nav-item href="#">Disabled</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>

  <About></About>

  <Footer></Footer>
</div>
</template>

<script>
import About from '../components/About.vue';
import Footer from '../components/Footer';

const default_layout = "default";

export default {
  components: {
    About,
    Footer,
  },
  computed: {},
  data() {
    return {
      message: "hej"
    }
  }
};
</script>
