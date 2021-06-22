<template>
    <div >
        <div class="container " :class="load == true ? 'asdsadsda' : ''">
            <div>
                <div class="mt-2">Name:</div>
                <b-form-input :style=" vailt_name?'border-color: red;' : '' " v-model="name" placeholder="Enter your name" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_name" style="color: red;">{{vailt_name}}</span>
            </div>
            <div>
                <div class="mt-2">Surname:</div>
                <b-form-input :style=" vailt_surname ? 'border-color: red;' : '' " v-model="surname" placeholder="Enter your surname" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_surname" style="color: red;">{{vailt_surname}}</span>
            </div>
            <div>
                <div class="mt-2">E-mail:</div>
                <b-form-input :style=" vailt_email? 'border-color: red;' : '' " v-model="email" placeholder="Enter your email" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_email" style="color: red;">{{vailt_email}}</span>
            </div>
            <div>
                <div class="mt-2">Phone:</div>
                <b-form-input :style=" vailt_phone? 'border-color: red;' : ''" v-model="phone" placeholder="Enter your phone" style="margin-top: 15px;"></b-form-input>
                <span v-if="vailt_phone" style="color: red;">{{vailt_phone}}</span>
            </div>
            <div>
                <b-button variant="success" style="margin-top: 15px;" @click="save()" :disabled="load">ok</b-button>
                <b-button variant="danger" style="margin-top: 15px;">cancel</b-button>
            </div>
            <!-- <span v-if="data_success">{{data_success['name']}} , {{data_success['surname']}} , {{data_success['email']}}, {{data_success['phone']}}</span>
            <span>{{message}}</span> -->
        </div>
    </div>
</template>
<script>

import Swal from 'sweetalert2'

export default {
    data() {
        return {
            name : '',
            surname : '',
            email : '',
            phone : '',
            data_success : [],
            message : '',
            load :false,
            vailt_name : '',
            vailt_surname : '',
            vailt_email : '',
            vailt_phone : ''
        }
        
    },
    computed:{

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
        save(){
            if(this.name == ''){
                this.vailt_name = 'กรุณากรอกชื่อ'
            }
            if(this.surname == ''){
                this.vailt_surname = 'กรุณากรอกนามสกุล'
            }
            if(this.email == ''){
                this.vailt_email = 'กรุณากรอกE-mail'
            }
            if(this.phone == ''){
                this.vailt_phone = 'กรุณากรอกเบอร์โทรศัพท์'
            }
            
            else{
                 this.load = true
                axios.post('/create',{
                names : this.name,
                surnames : this.surname,
                emails : this.email,
                phones : this.phone
            }).then((response)=>{
                if(response.data.status == 'success'){
                    this.data_success = response.data.data
                    this.name = ''
                    this.surname = ''
                    this.email = ''
                    this.phone = ''
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
                    });

                    // alert('เพิ่มข้อมูลสำเร็จ'+ response.data.status)
                }else{
                    console.log(response.data)
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: response.data.message,
                    });
                    // alert('กรุณาใส่้ข้อมูลให้ถูกต้อง'+ response.data.message)
                }
                this.load = false
                })
            }
            
        }
    }
}
</script>
<style>
.asdsadsda{
    background-color: antiquewhite;
}
</style>
