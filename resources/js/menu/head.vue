<template>
    <div>
        <div style="margin: 10px;" class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-info" @click="main()">Create</button>
            <!-- <button type="button" class="btn btn-info" @click="edit()">Edit</button> -->
            <button type="button" class="btn btn-info" @click="search()">Search</button>
            <button type="button" class="btn btn-warning" @click="productcreate()">Product Create</button>
            <button type="button" class="btn btn-warning" @click="productsearch()">Product Search</button>
            <button type="button" class="btn btn-secondary" @click="user()">User</button>
            <button type="button" class="btn btn-danger" @click="logout()">Logout</button>
            <button type="button" class="btn btn-link">{{ datas.username }}</button>
            <!-- <div>{{ datas.username }}</div> -->
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {

        datas : []    

        }
        
    },
        methods: {
        main(){
            this.$router.push({name:'Create'});
        },
        // edit(){
        //     this.$router.push({name:'Edit'});
        // },
        search(){
            this.$router.push({name:'Search'});
        },
        productcreate(){
            this.$router.push({name:'ProductCreate'});
        },
        productsearch(){
            this.$router.push({name:'ProductSearch'});
        },
        user(){
            this.$router.push({name:'User'});
        },
        logout(){
            axios.get('/logout',{

            }).then((response)=> {
                if(response.data == 'success'){
                window.location.href = '/login'
                }
            })
        },
        getdata(){
            axios.get('/showuserlogin',{

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
