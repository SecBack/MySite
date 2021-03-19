<template>
<div>
  <div id="home" href="top">
    <div class="container col-12 align-items-center" style="position: absolute;">
      <b-row class="justify-content-center">
        <h1 class="display-1" style="font-size:8vw;">
          Albert Andersen
        </h1>
      </b-row>
      <b-row class="justify-content-center">
        <h3 class="mr-2">
          <b-badge pill variant="info" class="mb-2">
            <b-icon icon="mailbox"></b-icon>
            albert3257@live.dk
          </b-badge>
        </h3>
        <h3>
          <b-badge pill variant="info" class="mb-2">
            <b-icon icon="telephone"></b-icon>
            41 60 76 37
          </b-badge>
        </h3>
      </b-row>
    </div>
    <particles-bg type="random" :bg="true" />
  </div>
  <div class="sticky-top">
    <b-navbar toggleable="lg" type="dark" variant="info" class="mb-5" v-b-scrollspy:nav-scroller>
      <b-navbar-brand>GoTo</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav v-b-scrollspy:nav-scroller>
          <b-nav-item href="#about" @click="scrollFromBar">About</b-nav-item>
          <b-nav-item href="#timeLine" @click="scrollFromBar">Time line</b-nav-item>
          <b-nav-item href="#projects" @click="scrollFromBar">Projects</b-nav-item>
          <b-nav-item href="#contact" @click="scrollFromBar">Contact</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>

  <div id="nav-scroller" class="container justify-content-center mb-5">
    <About id="about" class="mb-5"/>
    <TimeLine id="timeLine" class="mb-5"/>
    <Projects id="projects" class="mb-5"/>
    <hr>
    <Contact id="contact" class="mb-5 mt-5"/>
  </div>

  <AppFooter/>
</div>
</template>

<script>
import About from '../components/home/About.vue';
import AppFooter from '../components/home/AppFooter.vue';
import TimeLine from '../components/home/TimeLine.vue';
import Contact from '../components/home/Contact.vue';
import Projects from '../components/home/Projects.vue';
import { ParticlesBg } from "particles-bg-vue";

export default {
  components: {
    About,
    AppFooter,
    TimeLine,
    Contact,
    Projects,
    ParticlesBg,
  },
  data() {
    return {
    }
  },
  methods: {
    scrollFromBar(event) {
      event.preventDefault();
      const href = event.target.getAttribute('href');
      const el = href ? document.querySelector(href) : null;
      if (el) {
        el.scrollIntoView({ behavior: 'smooth', block: 'center'});
      }
    }
  },
}
</script>

<style>
.canvas {
  height: 100vh;
}

#home {
  height: 100vh
}
</style>
