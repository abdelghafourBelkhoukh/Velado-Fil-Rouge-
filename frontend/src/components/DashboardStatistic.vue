<template>
    <main class="bg-white-300 flex-1 p-3 pt-10 overflow-hidden">
        <div class="flex flex-col">
            <!-- Stats Row Starts Here -->
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div class="shadow-lg bg-red-500 border-l-8 hover:bg-red-600 border-red-700 mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            $244
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Sales
                        </a>
                    </div>
                </div>
                <div class="shadow bg-blue-500 border-l-8 hover:bg-blue-600 border-blue-700 mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            $199.4
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Cost
                        </a>
                    </div>
                </div>
                <div class="shadow bg-yellow-500 border-l-8 hover:bg-yellow-600 border-yellow-700 mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            $900
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Users
                        </a>
                    </div>
                </div>
                <div class="shadow bg-green-500 border-l-8 hover:bg-green-600 border-green-700 mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            $500
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Products
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Stats Row Ends Here -->
        </div>
    </main>
</template>

<script>

export default{
    name:'DashboardStatistic',
    data(){
        return{
            //
        }
    },
}


</script>