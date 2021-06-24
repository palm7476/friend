<template>
  <table class="table table-success table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">E-mail</th>
          <th scope="col">Phone</th>
          <th><div class="col-3"></div><b-form-input v-model="data" placeholder="Enter your name"></b-form-input>
          </th>
          <th><b-button variant="success" @click="getdata()">ok</b-button></th>
        </tr>
      </thead>
      <tbody v-if="datas">
          <!-- <tr>

              <td>{{ datas[10].name }}</td>
          </tr> -->
        <tr v-for="(data,i) in datas" :key="i">
            <th scope="row" @click="edit(data.id)" style="cursor: pointer;">
               {{data.id}}     
            </th>
            <td>{{data.name}}</td>
            <td>{{data.surname}}</td>
            <td>{{data.email}}</td>
            <td>{{data.phone}}</td>
            <td></td>
            <td></td>
        </tr>
      </tbody>
  </table>
</template>

<script>
export default {
    data() {
        return{

        datas : [],
        data :''
        }
        
    },
    components:{
    },
    computed:{

    },
    methods:{
        getdata(){
            axios.get('/searchdata',{params:{
                search : this.data
            }}).then((response)=>{
                this.datas=response.data;
            });
        },

        edit(id){
            this.$router.push({name:'Edit',
                params:{
                    ids:id
                }
            });
        }
    },
    created(){
            this.getdata()
    }
}
</script>