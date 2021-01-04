<template>
  <div>
      <button @click="getUsers">Get random users</button>

      <GenderCounter gender="male" />
      <GenderCounter gender="female" />

      <div class="list">
        <GenderList gender="male" />
        <GenderList gender="female" />
      </div>
  </div>
</template>

<script>
export default {
  components: {
    GenderCounter: () => import('@/components/GenderCounter'),
    GenderList: () => import('@/components/GenderList')
  },
  methods:{
    getUsers() {
      this.$store.dispatch('users/getRandomUsers')
    }
  }
}
</script>

<style>
.list {
  display: flex;
  justify-content: space-between;
  padding: 0 10%;
}
</style>