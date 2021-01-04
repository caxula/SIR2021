<template>
    <div>
        <h2>{{gender.toUpperCase()}}S:</h2>

        <ListUsers :Users="mapUsers" /> 
    </div>
</template>

<script>
export default {
    components: {
        ListUsers: () => import("@/components/ListUsers")
    },
    props: {
        gender: String
    },
    computed: {
        mapUsers() {
            return this.getUsersByGender.map(user=> {
                return {
                    uuid: user.login.uuid,
                    name: `${user.name.first} ${user.name.last}`
                }
            })
        },
        getUsersByGender() {
            return this.$store.getters['users/getByGender'](this.gender)
        }
    }
}
</script>

<style>

</style>