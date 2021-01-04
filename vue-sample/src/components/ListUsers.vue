<template>
  <div>
      <h4 v-if="Users.length === 0">No users</h4>
        <div v-else>
            <p v-for="(user, idx) in Users" :key="idx" @click="removeUser(user.uuid)">
                {{user.name}}
            </p>
        </div>
  </div>
</template>

<script>
export default {
    props: {
        Users: Array
    },
    methods: {
        removeUser(uuid){
            if(!uuid) return

            this.$store.dispatch("users/removeUser", uuid)
        }
    }
}
</script>

<style scoped>
p {
    cursor: pointer;
}
</style>