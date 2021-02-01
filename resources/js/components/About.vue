<template>
<div>
  <b-container>
    <b-row>
      <b-col>
        <b-row class="justify-content-center">
          <b-img src="https://picsum.photos/300/300"></b-img>
        </b-row>
      </b-col>
      <b-col class="justify-content-center">
        {{aboutText}}
      </b-col>
    </b-row>
  </b-container>
</div>
</template>

<script>
export default {
  computed: {},
  data() {
    return {
      aboutText: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
    }
  }
};
</script>
