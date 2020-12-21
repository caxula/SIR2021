<template>
    <div>
        <form ref="form" class="form">
            <input v-model="numero" placeholder="Número">
            <input v-model="nome" placeholder="Nome">

            <button type="button" @click="add()">Add</button>
        </form>

        <div class="lista">

            <h4 v-if="getAlunos.length === 0">Sem alunos inseridos</h4>
            <div v-else>
                <p v-for="(aluno, index) in getAlunos" :key="index" @click="remove(index)">
                    {{aluno.numero}} - {{aluno.nome}}
                </p>
            </div>

        </div>
    </div>
</template>

<script>
export default{
    data: () => ({
        numero: '',
        nome: '',
        alunos: []
    }),
    computed: {
        getAlunos(){
            return this.alunos
        }
    },
    methods: {
        add(){
            if(!this.numero || !this.nome) return

            this.alunos.push({
                numero: this.numero,
                nome: this.nome
            })

            this.$refs.form.reset()

            this.numero = this.nome = ''
        },
        remove(idx){
            if(idx > -1) {
                this.alunos.splice(idx,1)
            }
        }
    }
}
</script>

<style scoped>
.lista {
    display: flex;
    justify-content: center;
}

p {
    cursor: pointer;
    background-color: beige;
}
</style>