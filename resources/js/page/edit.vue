<template>
    <div>
        <div class="container">
            <div>
                <div class="mt-2">Name:</div>
                <b-form-input :style="vailt_name?'border-color: red;' : '' " v-model="name" placeholder="Enter your name" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_name" style="color: red;">{{vailt_name}}</span>
            </div>
            <div>
                <div class="mt-2">Surname:</div>
                <b-form-input :style="vailt_surname?'border-color: red;' : '' " v-model="surname" placeholder="Enter your surname" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_surname" style="color: red;">{{vailt_surname}}</span>
            </div>
            <div>
                <div class="mt-2">E-mail:</div>
                <b-form-input :style="vailt_email?'border-color: red;' : '' " v-model="email" placeholder="Enter your phone" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_email" style="color: red;" >{{vailt_email}}</span>
            </div>
            <div>
                <div class="mt-2">Phone:</div>
                <b-form-input :style="vailt_phone?'border-color: red;' : '' " v-model="phone" placeholder="Enter your phone" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_phone" style="color: red;" >{{vailt_phone}}</span>
            </div>
            <div>
                <b-button variant="success" style="margin-top: 15px;" @click="update()">ok</b-button>
                <b-button variant="danger" style="margin-top: 15px;">cancel</b-button>
            </div>
            
            <!-- <div>
                <div class="mt-2">Array data1: {{data1[key]}} || Array data2 : {{data2[key]}}</div>
                <b-form-input v-model="key" placeholder="key" style="margin-top: 15px;"></b-form-input>
            </div> -->
            
            <!-- <span v-if="data_success">{{data_success['name']}} , {{data_success['surname']}} , {{data_success['email']}}, {{data_success['phone']}}</span> -->
            <!-- <span>{{message}}</span> -->
            <!-- <span>{{datas}}</span> -->
        </div>
    </div>
</template>
<script>

import Swal from 'sweetalert2'

export default {
    data()  {
        return {
            name :'',
            surname :'',
            email :'',
            phone :'',
            vailt_name :'',
            vailt_surname :'',
            vailt_email :'',
            vailt_phone :'',

            id:this.$route.params.ids,


        }
    },
    watch:{
        'name'(val){
            this.vailt_name = ''
        },
        'surname'(val){
            this.vailt_surname = ''
        },
        'email'(val){
            this.vailt_email = ''
        },
        'phone'(val){
            this.vailt_phone = ''
        }
    },

    methods:{
        getdata(){
                axios.get('/search',{
                    params:{
                        id :this.id,
                    }
                }).then((response)=>{
                    this.name=response.data.name  
                    this.surname=response.data.surname   
                    this.email=response.data.email
                    this.phone=response.data.phone
                })

        },

        update(){
            if(this.name == ''){
                this.vailt_name = 'กรุณากรอกชื่อ'
            }
            if(this.surname == ''){
                this.vailt_surname = 'กรุณากรอกนามสกุล'
            }
            if(this.email == ''){
                this.vailt_email = 'กรุณากรอกEmail'
            }
            if(this.phone == ''){
                this.vailt_phone = 'กรุณากรอกเบอร์โทรศัพท์'
            }
            else{
                axios.post('/update',{
                id :this.id,
                names :this.name,
                surnames :this.surname,
                emails :this.email,
                phones :this.phone
            }).then((response)=>{
                if(response.data.status == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: 'แก้ไขเรียบร้อยแล้ว',
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: response.data.message,
                    });
                }
                })
            }

            
        }
    },

    created(){
        this.getdata()
    }
}
</script>