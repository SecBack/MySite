<template>
<div id="app">
  <div id="home" style="position: relative;">
    <div class="container col-12 align-items-center" style="position: absolute;">
      <b-row class="justify-content-center">
        <h1 class="display-1">
          Albert Andersen
        </h1>
      </b-row>
      <b-row class="justify-content-center">
        <h3 class="mr-2">
          <b-badge href="#" pill variant="info" class="mb-2">
            <b-icon icon="mailbox"></b-icon>
            albert3257@live.dk
          </b-badge>
        </h3>
        <h3>
          <b-badge href="#" pill variant="info" class="mb-2">
            <b-icon icon="telephone"></b-icon>
            41 60 76 37
          </b-badge>
        </h3>
      </b-row>
    </div>
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
  <div class="sticky-top">
    <b-navbar toggleable="lg" type="dark" variant="info" class="mb-5">
      <b-navbar-brand href="#">GoTo</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item href="#">About</b-nav-item>
          <b-nav-item href="#">Time line</b-nav-item>
          <b-nav-item href="#">Contact</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>

  <div class="container justify-content-center col-8 mb-5">
    <About class="mb-5"></About>

    <TimeLine class="mb-5"></TimeLine>
    <hr>
    <Contact class="mb-5 mt-5"></Contact>

  </div>
    <AppFooter></AppFooter>
</div>
</template>

<script>
import About from '../components/About.vue';
import AppFooter from '../components/AppFooter.vue';
import TimeLine from '../components/TimeLine.vue';
import Contact from '../components/Contact.vue';

const default_layout = "default";

export default {
  components: {
    About,
    AppFooter,
    TimeLine,
    Contact,
  },
  computed: {},
  data() {
    return {
      message: "hej"
    }
  }
};
</script>
