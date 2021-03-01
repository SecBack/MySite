<template>
<b-container class="col-12 p-0">
  <b-card-footer>
    <b-row>
      <b-col>
        <b-row class="justify-content-center">
          <h2>
            <b-card-text class="small text-muted mb-4">Navigation</b-card-text>
          </h2>
        </b-row>
        <b-row class="justify-content-center">
          <h3>
            <b-badge
              href="#top"
              pill variant="info"
              class="mb-2"
              @click="scrollFromFooter"
            >Top</b-badge>
          </h3>
        </b-row>
        <b-row class="justify-content-center">
          <h3>
            <b-badge
              href="#about"
              pill variant="info"
              class="mb-2"
              @click="scrollFromFooter"
            >About</b-badge>
          </h3>
        </b-row>
        <b-row class="justify-content-center">
          <h3>
            <b-badge
              href="#timeLine"
              pill variant="info"
              @click="scrollFromFooter"
            >Time line</b-badge>
          </h3>
        </b-row>
        <b-row class="justify-content-center">
          <h3>
            <b-badge
              href="#projects"
              pill variant="info"
              @click="scrollFromFooter"
            >Projects</b-badge>
          </h3>
        </b-row>
      </b-col>
      <b-col>
        <b-row class="justify-content-center">
          <h2>
            <b-card-text class="small text-muted mb-4">Contact</b-card-text>
          </h2>
        </b-row>
        <b-row class="justify-content-center">
          <h3>
            <b-badge pill variant="info" class="mb-2">
              <b-icon icon="telephone"></b-icon>
              41 60 76 37
            </b-badge>
          </h3>
        </b-row>
        <b-row class="justify-content-center">
          <h3>
            <b-badge pill variant="info" class="mb-2">
              <b-icon icon="mailbox"></b-icon>
              albert3257@live.dk
            </b-badge>
          </h3>
        </b-row>
        <b-row class="justify-content-center">
          <h3>
            <b-badge pill variant="info" class="mb-2">
              <b-icon icon="linkedin"></b-icon>
              linked in
            </b-badge>
          </h3>
        </b-row>
      </b-col>
      <b-col cols="12" sm="4" class="pa-sm-3">
        <iframe
          width="100%"
          height="100%"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2266.697687659117!2d10.406397015492493!3d55.3807318804555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464d201832353ad3%3A0x3b1144a314aa0074!2sSyddansk%20Erhvervsskole%20Munkebjergvej!5e0!3m2!1sda!2sdk!4v1600323306005!5m2!1sda!2sdk"
          frameborder="0"
          style="border:0;"
          allowfullscreen=""
          aria-hidden="false"
          tabindex="0"
        ></iframe>
      </b-col>
    </b-row>
  </b-card-footer>
</b-container>
</template>

<script>
export default {
  name: "AppFooter",
  data() {
    return {
      message: "hej"
    }
  },
  methodes: {
    scrollFromFooter(event) {
      event.preventDefault();
      const href = event.target.getAttribute('href');
      const el = href ? document.querySelector(href) : null;
      if (el) {
        el.scrollIntoView({ behavior: 'smooth', block: 'center'});
      }
    }
  }
}
</script>
