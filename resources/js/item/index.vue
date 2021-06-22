<template>
  <table class="table table-info table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Brand_Id</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Type_id</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(data,i) in datas" :key="i">
            <th scope="row"> 
                {{ data.id }}
            </th>
            <!-- <td><b-form-input v-model="data.product_name " placeholder="Enter your product name"></b-form-input></td>
            <td><b-form-input v-model="data.price " placeholder="Enter your price"></b-form-input></td> -->
            <td>{{ data.brand.name }}</td>
            <td>{{ data.name }}</td>
            <td>{{ data.price }}</td>
            <td>{{ data.type.name }}</td>
            <!-- <td><button type="button" class="btn btn-success" @click="save(data.id,data.product_name,data.price)">Save</button></td>
            <td><button type="button" class="btn btn-warning" @click="edit(data.id)">Edit</button></td>
            <td><button type="button" class="btn btn-danger" @click="del(data.id)">Delete</button></td> -->
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
    computed:{
    //     data_lopp(){
    //         return this.datas.map((d)=>{ //return datas ไปเก่็บไว้ใน data_lopp
    //             if(d.name == 'iphone11'){
    //                 d.name = d.name+'v.1'
    //             }
    //             return d //return d ตัวแรกไปเก็บไว้ในdatas

    //         })
    //     },
    },
    methods:{
        getdata(){
            axios.get('/items', {

            }).then((response)=>{
                this.datas=response.data;
            })
        },
      
    },
    created(){
        this.getdata()
    }
}
</script>