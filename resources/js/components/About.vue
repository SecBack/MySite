<template>
<div>
  <b-card>
  <b-container>
    <b-row>
      <b-col>
        <b-row class="justify-content-center">
          <b-img src="https://picsum.photos/300/300" rounded="circle"></b-img>
        </b-row>
      </b-col>
      <b-col class="justify-content-center">
        <b-card-title>Who is this guy?</b-card-title>
        {{aboutText}}
      </b-col>
    </b-row>
  </b-container>
  </b-card>
</div>
</template>

<script>
export default {
  computed: {},
  data() {
    return {
      aboutText: "As a 21-year-old diligent guy, located in the southern part of Jylland around Vejle. I have been kept active with gymnastics, football, and taekwondo while I was growing up. Later I have become a mountain bike-riding computer nerd, with tendencies to various physical activities."
    }
  }
};
</script>
