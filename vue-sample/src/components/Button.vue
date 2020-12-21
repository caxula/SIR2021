<template>
  <div>
    <button @click="increment()" v-bind:style="{backgroundColor: Color}">
        {{Text}}
    </button>

    <div v-html="printCounter"></div>
  </div>
</template>

<script>
export default {
    props: {
        Color: String,
        Text: String,
        Limit: Number,
        Start: Number,
    },
    data: () => ({
        counter: 0
    }),
    mounted() {
        this.counter = this.Start
    },
    computed: {
        printCounter() {
            if(this.counter < this.Limit) {
                return `<h3 style="color: red;">Counter is: ${this.counter}</h3>`
            }
            else {
                return `<h3 style="color: green;">Counter is: ${this.counter}</h3>`
            }
        }
    },
    methods: {
        increment() {
            this.counter = this.counter + 1;
        }
    }
}
</script>

<style scoped>
    button{
        width: 100px;
    }
</style>