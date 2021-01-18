<template>
<div class="container col-10 justify-content-center">
  <b-card title="Contact">
    <b-card-text class="small text-muted">Get in contact or let me know about feedback</b-card-text>
    <b-form-input v-model="name" placeholder="Name..." class="col-4 mb-2"></b-form-input>
    <b-form-input v-model="email" placeholder="Email..." class="col-4 mb-2"></b-form-input>
    <b-form-textarea
      id="textarea"
      v-model="message"
      placeholder="Message..."
      rows="6"
      max-rows="6"
      class="mb-2"
    ></b-form-textarea>
    <b-button href="#" variant="info">Send</b-button>
  </b-card>
</div>
</template>

<script>
export default {
  name: "Contact",
  data() {
    return {
      text: {
        name: "",
        email: "",
        mesage: "",
      }
    }
  }
}
</script>
