<template>
    <div class="section-image hidden md:block ">
        <div class="md:bg-black md:w-100 md:h-full md:opacity-50">
        </div>
            <div class="container md:text-white md:absolute md:top-[30vh]">
                <div class="text-center mt-14">
                    <h1 class="font-bold text-8xl">{{this.$store.state.caregoryName}}</h1>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SectionImagesCategory",
    data() {
        return {
            //
        };
    },
}
</script>

<style lang="scss" scoped>
.section-image{
    background-image: url("../../assets/images/categorybackground.jpg");
    // background-color: aquamarine;
    background-size: cover;
    background-position: center;
    height: 85vh;
}
</style>
