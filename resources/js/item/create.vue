<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-6">          
                    <div>
                        <h4>Brand</h4>
                        <div >Name:</div>
                        <b-form-input v-model="name" placeholder="Enter your name" style="margin-top: 15px;width: 200px;"></b-form-input>
                        <!-- <span v-if="vailt_name" style="color: red;">{{vailt_name}}</span> -->
                    </div>
                    <div>
                        <b-button variant="success" style="margin-top: 15px;" @click="save()">ok</b-button>
                        <b-button variant="danger" style="margin-top: 15px;">cancel</b-button>
                    </div>
                </div>
                <div class="col-6">
                    <show-brand :datas_123="datas" @save_ppp="save_ppp_ppp"></show-brand>
                </div>
            </div>
            

        </div>
    </div>
</template>
<script>
import ShowBrand from './showbrand'
export default {
    data() {
        return{

        datas : [],
        data_type : [],
        brands : [],
        name : '',
        selected_brand : '',
        name_item : '',


        // data :''
        }
        
    },
    components:{
        ShowBrand
    },
    computed:{

    },
    methods:{
        save_ppp_ppp(val){
            console.log(val)
            this.name=val;
            alert(val)
        },
        getdata(){
            axios.get('/showbrand', {

            }).then((response)=>{
                this.datas=response.data;
                this.brands=response.data;
            })
        },
        save(){
            axios.post('/createbrand',{
                names : this.name
            }).then((response)=>{
                if(response.data.status == 'success'){
                    this.name = ''
                    alert('เพิ่มข้อมูลสำเร็จ' + response.data.status)
                    this.getdata()
                }
            })
        },
        getdata2(){
            axios.get('/showtype',{

            }).then((response)=>{
                this.data_type=response.data;
            })
        }


        // edit(id){
        //     this.$router.push({name:'Edit',
        //         params:{
        //             ids:id
        //         }
        //     });
        // }
    },
    created(){
            this.getdata()
            this.getdata2()
    }
}
</script>
