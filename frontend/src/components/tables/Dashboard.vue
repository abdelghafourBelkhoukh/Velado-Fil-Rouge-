<template>
    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 h-auto ">
                        <!-- card -->
                        <div class="rounded  shadow bg-white mx-5 w-full h-auto">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="text-red-700 text-2xl font-bold">Trending</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-grey-darkest text-center w-full h-full">
                                    <thead class="bg-black text-white text-normal">
                                    <tr class="py-2 h-12">
                                        <th scope="col">test</th>
                                        <th scope="col">test</th>
                                        <th scope="col">test</th>
                                        <th scope="col">test</th>
                                        <th scope="col">test</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->
</template>

<script>
export default{
    name:'Dashboard',
    data(){
        return{
            //
        }
    },
    mounted(){
        this.$store.state.SreachBarTable = 'Dashboard'
    },
}
</script>