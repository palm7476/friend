<template>
  <table class="table table-info table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(data,i) in datas" :key="i">
            <th>{{ data.id }}</th>
            <td>{{ data.name }}</td>
            <td>{{ data.username }}</td>
        </tr>
      </tbody>
  </table>
  
</template>
<script>
export default {
    data() {
        return {
            datas : []
        }
    },

    methods:{
        getdata(){
            axios.get('/showuser',{

            }).then((response)=>{
                this.datas=response.data;
            })
        }
    },
    created(){
        this.getdata()
    }
}
</script>
