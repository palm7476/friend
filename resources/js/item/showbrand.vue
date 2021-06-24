<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name Brand</th>
                </tr>
            </thead>
            <tbody v-if="datas_123">
                <tr v-for="(data,i) in datas_123" :key="i">
                <th scope="row">{{ data.id }}</th>
                <td>{{ data.name }}</td>
                </tr>
            </tbody>
        </table>
        <b-button variant="success" style="margin-top: 15px;" @click="save()">ok</b-button>
    </div>

    
</template>
<script>
export default {
    props:['datas_123'],
    data() {
        return{
            data:'5555555'
        }
    },
    methods:{
        save(){
            this.$emit('save_ppp',this.data)
        }
    }
}
</script>