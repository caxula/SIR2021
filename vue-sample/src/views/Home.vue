<template>
  <div class="home">
    <h1>Total of users: {{getUsers.length}}</h1>
    <ListUsers :Users="getUsers" />
  </div>
</template>

<script>

export default {
  name: 'Home',
  components: {
    ListUsers: () => import("@/components/ListUsers")
  },
  computed: {
    getUsers() {
      return this.$store.getters['users/getAll'].map(user => {
        return {
          uuid: user.login.uuid,
          name: `${user.name.first} ${user.name.last}`
        }
      })
    }
  }
}
</script>
