<template>
    <div>
        <h2>Number of {{gender}}s: {{numberOfUsersByGender}}</h2>
    </div>
</template>

<script>
export default {
    props: {
        gender: String
    },
    computed: {
        numberOfUsersByGender() {
            return this.$store.getters['users/getByGender'](this.gender).length
        }
    }
}
</script>

<style>

</style>