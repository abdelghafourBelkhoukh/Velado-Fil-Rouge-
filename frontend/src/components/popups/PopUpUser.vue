<template>
    <!--model popup tailwind-->
    <div class=" fixed bg-black opacity-50 w-screen h-screen top-0 left-0 z-10" @click="popupUser"></div>
    <div class="flex items-center justify-center absolute  w-screen h-screen ">
        <div class="modal z-30  bg-white md:w-1/3 px-4 py-8 rounded" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-user" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content  h-[60vh]">
                    <div class="modal-header ">
                        <button @click="popupUser" class="w-full text-right">
                            <span class="text-3xl text-red-500 font-bold" aria-hidden="true" >&times;</span>
                        </button>
                        <h5 class="modal-title  pb-8 text-xl font-medium text-center" id="modal-user">Add user</h5>
                    </div>
                    <div class="modal-body overflow-auto h-[40vh]">
                        <!--input add user-->
                        <div class="flex flex-col">
                            <div class="flex flex-col py-1">
                                <label for="FirstName" class="text-sm text-gray-600">first Name</label>
                                <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg " id="FirstName" v-model="usersData.firstname">
                            </div>
                            <div class="flex flex-col py-1">
                                <label for="LastName" class="text-sm text-gray-600">Last Name</label>
                                <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="LastName" v-model="usersData.lastname">
                            </div>
                            <div class="flex flex-col py-1">
                                <label for="Email" class="text-sm text-gray-600">Email</label>
                                <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Email" v-model="usersData.email">
                            </div>
                            <div class="flex flex-col py-1">
                                <label for="Country" class="text-sm text-gray-600">Country</label>
                                <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Country" v-model="usersData.country">
                            </div>
                            <div class="flex flex-row justify-between">
                                <div class="flex flex-col py-1">
                                    <label for="City" class="text-sm text-gray-600">City</label>
                                    <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="City" v-model="usersData.city">
                                </div>
                                <div class="flex flex-col py-1">
                                    <label for="Zip" class="text-sm text-gray-600">Zip</label>
                                    <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Zip" v-model="usersData.zip">
                                </div>
                            </div>
                            <div class="flex flex-col py-1">
                                <label for="Address" class="text-sm text-gray-600">Address</label>
                                <input type="text" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Address" v-model="usersData.address">
                            </div>
                            <div class="flex flex-col py-1">
                                <label for="Password" class="text-sm text-gray-600">Password</label>
                                <input type="password" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="Password" v-model="usersData.password">
                            </div>
                            <div class="flex flex-col py-1">
                                <label for="PasswordConfirmation" class="text-sm text-gray-600">Password Confirmation</label>
                                <input type="password" class="w-full p-2 border-2 border-gray-400 rounded-lg" id="PasswordConfirmation" v-model="usersData.passwordConfirmation">
                            </div>
                            
                        </div>
                    </div>
                    <!--button close and save-->
                    <div class="modal-footer w-full pt-6 flex justify-end">
                        <button type="button" class="px-3 py-2 bg-black hover:bg-green-700 text-white rounded" @click="addUser">Save</button>
                        <button type="button" class=" bg-black hover:bg-red-700 px-3 py-2 text-white rounded ml-4" data-dismiss="modal" @click="popupUser">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>

<script>
import axios from 'axios'

export default{
    name:'PopUpUser',
    data(){
        return{
            usersData :{
                firstname:'',
                lastname:'',
                email:'',
                country:'',
                city:'',
                zip:'',
                address:'',
                password:'',
                passwordConfirmation:'',
                type:'customer'
            }
        }
    },
    methods:{
        popupUser(){
            this.$store.commit('popupUser')
        },
        addUser(){
            if(this.password === this.passwordConfirmation){
                axios.post('http://localhost/fil-rouge/backend/Api/gestionClient/ClientController.php',this.usersData)
            .then(response => {
                console.log(response.data.message)

                this.$store.commit('popupUser')
                this.$store.dispatch("GetUsers")
            })
            }else{
                alert('password not match')
            }
        }
    },
}


</script>


