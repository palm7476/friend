<template>
    <div>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-3">
                    <div class="mt-2">ProductName:</div>
                    <b-form-input v-model="productname" placeholder="Enter your name" style="margin-top: 15px;"></b-form-input>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col-3">  
                    <div class="mt-2">Price:</div>
                    <b-form-input v-model="price" placeholder="Enter your price" style="margin-top: 15px;"></b-form-input>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col-3">
                    <div class="mt-2">Type:</div>
                    <b-form-input v-model="type" placeholder="Enter your type" style="margin-top: 15px;"></b-form-input>
                </div>    
            </div>

            <div class="row align-items-start"> 
                <div class="col-3">       
                    <div class="mt-2">Detail:</div>
                    <b-form-input v-model="detail" placeholder="Enter your detail" style="margin-top: 15px;"></b-form-input>
                </div>   
            </div>

            <div>
                <b-button variant="success" style="margin-top: 15px;" @click="save()">ok</b-button>
                <b-button variant="danger" style="margin-top: 15px;">cancel</b-button>
            </div>
        </div>
        
    </div>
</template>
<script>
export default {
    data() {
        return{
            productname: '',
            price: '',
            type: '',
            detail: '',
            data_success : []
        }
    },
    computed:{

    },
    methods: {
        save(){
            axios.post('/createproduct',{
                productnames : this.productname,
                prices : this.price,
                types : this.type,
                details : this.detail
            }).then((response)=>{
                if(response.data.status == 'success'){
                    this.data_success = response.data.data
                    this.productname = ''
                    this.price = ''
                    this.type = ''
                    this.detail = ''
                    alert('เพิ่มข้อมูลสำเร็จ' + response.data.status)
                }

            })
        }
    }
}
</script>