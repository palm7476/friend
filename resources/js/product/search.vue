<template>
  <table class="table table-info table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">ProductName</th>
          <th scope="col">Price</th>
          <th scope="col">Type</th>
          <th scope="col">Detail</th>
          <th scope="col">Button</th>
          <th scope="col">Button</th>
          <th scope="col">Button</th>
        </tr>
      </thead>
      <tbody>
          <!-- <tr>

              <td>{{ datas[10].name }}</td>
          </tr> -->
        <tr v-for="(data,i) in datas" :key="i">
            <th scope="row"> <!--style="cursor: pointer;"-->
                {{ data.id }}
            </th>
            <td><b-form-input v-model="data.product_name " placeholder="Enter your product name"></b-form-input></td>
            <td><b-form-input v-model="data.price " placeholder="Enter your price"></b-form-input></td>
            <td>{{ data.type }}</td>
            <td>{{ data.detail }}</td>
            <td><button type="button" class="btn btn-success" @click="save(data.id,data.product_name,data.price)">Save</button></td>
            <td><button type="button" class="btn btn-warning" @click="edit(data.id)">Edit</button></td>
            <td><button type="button" class="btn btn-danger" @click="del(data.id)">Delete</button></td>
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
    // // computed:{
    // //     data_lopp(){
    // //         return this.datas.forEach((d)=>{
    // //             if(d.name == 'iphone'){
    // //                 d.name = d.name+'v.1'
    // //             }
    // //             return d

    // //         })
    // //     },
    // },
    methods:{
        getdata(){
            axios.get('/showproduct', {

            }).then((response)=>{
                this.datas=response.data;
            })
        },
        edit(id){
            this.$router.push({name:'ProductEdit',
                params:{
                    ids:id
                }
            });
        },
        del(id){
            var r = confirm("Press a button!");
            if (r == true) {
                axios.post('/delete',{
                id : id ,
                // name : name
            }).then((response)=>{
                if(response.data == 'success'){
                    this.getdata()
                }
            })
            } else {
              
            }
           
        },   
        save(id,name,price){
            axios.post('/save',{
                id : id ,
                productnames : name,
                prices : price
            }).then((response)=>{
                if(response.data.status == 'success'){
                    alert('แก้ไขข้อมูลสำเร็จ')
                    this.getdata()
                }
            })
        } 
    },
    created(){
        this.getdata()
    }
}
</script>