<template>
    <div>
        <div class="container">
            <div>
                <div class="mt-2">ProductName:</div>
                <b-form-input v-model="productname" placeholder="Enter your name" style="margin-top: 15px;"></b-form-input>
            </div>
            <div>
                <div class="mt-2">Price:</div>
                <b-form-input v-model="price" placeholder="Enter your surname" style="margin-top: 15px;"></b-form-input>
            </div>
            <div>
                <div class="mt-2">Type:</div>
                <b-form-input v-model="type" placeholder="Enter your phone" style="margin-top: 15px;"></b-form-input>
            </div>
            <div>
                <div class="mt-2">Detail:</div>
                <b-form-input v-model="detail" placeholder="Enter your phone" style="margin-top: 15px;"></b-form-input>
            </div>
            <div>
                <b-button variant="success" style="margin-top: 15px;" @click="update()">ok</b-button>
                <b-button variant="danger" style="margin-top: 15px;">cancel</b-button>
            </div>
        </div>
    </div>
    
</template>
<script>
export default {
    data() {
        return {
            productname : '',
            price : '',
            type : '',
            detail: '',

            id:this.$route.params.ids,
        }
        
    },
    methods:{
        getdata(){
            axios.get('/searchproduct',{
                params:{
                    id :this.id,
                }
            }).then((response)=>{
                this.productname = response.data.product_name
                this.price = response.data.price
                this.type = response.data.type
                this.detail = response.data.detail
            })
        },
        update(){
            axios.post('/updateproduct',{
                id :this.id,
                productnames :this.productname,
                prices :this.price,
                types :this.type,
                details :this.detail
            }).then((response)=>{
                if(response.data.status == 'success'){
                    alert('ใส่ข้อมูลถูกต้อง')
                }
            })
        }
    },
    created(){
       this.getdata() 
    }
}
</script>