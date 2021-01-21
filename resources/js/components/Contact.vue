<template>
<div class="container col-10 justify-content-center">
  <b-card title="Contact">
    <b-form @submit="onSubmit">
      <b-card-text class="small text-muted">Get in contact or let me know about feedback</b-card-text>

      <b-form-input v-model="form.name" placeholder="Name..." class="col-4 mb-2"></b-form-input>
      <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>

      <b-form-input v-model="form.email" placeholder="Email..." class="col-4 mb-2"></b-form-input>
      <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>

      <b-form-textarea
        id="textarea"
        v-model="form.message"
        placeholder="Message..."
        rows="6"
        max-rows="6"
        class="mb-2"
      ></b-form-textarea>
      <div v-if="errors && errors.mesage" class="text-danger">{{ errors.message[0] }}</div>

      <b-button type="submit" variant="info">Send</b-button>
    </b-form>
  </b-card>
</div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Contact",
  data() {
    return {
      form: {
        name: "",
        email: "",
        message: "",
      },
      errors: {},
    }
  },
    methods: {
      onSubmit() {
        const postData = {
          name: this.form.name,
          email: this.form.email,
          message: this.form.message,
        };
        axios.post('/contact', postData)
      }
  },
}
</script>
