<template>
<NavBar />
<SubNavBar />
  <div class="about">
    <body class="text-gray-700 bg-white antialiased" style="font-family: 'Roboto', sans-serif">
        
        <!-- Features -->
        <section class="container mx-auto px-6 p-10">
          <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Velado!</h2>
          <div class="flex items-center flex-wrap mb-20">
            <div class="w-full md:w-1/2 pr-10">
              <h4 class="text-3xl text-gray-800 font-bold mb-3">Velado</h4>
              <p class="text-gray-600 mb-8">“velado" est une entreprise qui vend des légumes et des fruits naturels en ligne, et elle est actuellement en train de la creation.</p>
            </div>
            <div class="w-full md:w-1/2">
              <img class="rounded-lg" src="../assets/images/pic3.jpg" alt="Velado" />
            </div>
          </div>
          <div class="flex items-center flex-wrap mb-20">
            <div class="w-full md:w-1/2">
              <img class="rounded-lg" src="../assets/images/pic1.jpg" alt="use the force" />
            </div>
            <div class="w-full md:w-1/2 pl-10">
              <h4 class="text-3xl text-gray-800 font-bold mb-3">ETUDE FONCTIONNELLE!</h4>
              <p class="text-gray-600 mb-8">le site présentera aux clients des produits de haute qualité avec différentes catégories de légumes et de fruits normaux et biologiques,
                  des denrées alimentaires cella comme une idée de départ.
                  les clients peuvent payer sur le site ou en espèces lors de la livraison et la livraison à domicile.
              </p>
            </div>
          </div>
          <div class="flex items-center flex-wrap mb-20">
            <div class="w-full md:w-1/2 pr-10">
              <h4 class="text-3xl text-gray-800 font-bold mb-3">Life creates it</h4>
              <p class="text-gray-600 mb-8">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores, 
                laudantium unde alias quae aut a eos officia quas vero dolor modi quod omnis dolores eligendi.
                Ut omnis tenetur suscipit voluptas!</p>
            </div>
            <div class="w-full md:w-1/2">
              <img class="rounded-lg" src="../assets/images/pic2.jpg" alt="Syncing" />
            </div>
          </div>
        </section>
        
        <!-- Testimonials -->
        <section class="bg-gray-200">
          <div class="container mx-auto px-6 py-20">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Velado expresses</h2>
            <div class="flex flex-wrap">
              
              <div class="w-full h-auto md:w-1/3 px-2 mb-4">
                <div class="flex flex-col justify-between h-full bg-white rounded shadow py-2">
                  <p class="text-gray-800 text-base px-6 mb-5">How are you feeling, kid? You don't look so bad to me. In fact, you look strong enough to pull the ears off a Gundark. Thanks to you.</p>
                  <p class="text-gray-500 text-xs md:text-sm px-6">Abdelghafour belkhoukh</p>
                </div>
              </div>
              
              <div class="w-full h-auto md:w-1/3 px-2 mb-4">
                <div class="flex flex-col justify-between h-full bg-white rounded shadow py-2">
                  <p class="text-gray-800 text-base px-6 mb-5">That's two you owe me, junior. Well your Worship, looks like you managed to keep me around for a little while longer. I had nothing to do with it.</p>
                  <p class="text-gray-500 text-xs md:text-sm px-6">Hamza belkhoukh</p>
                </div>
              </div>
              
              <div class="w-full h-auto md:w-1/3 px-2 mb-4">
                <div class="flex flex-col justify-between h-full bg-white rounded shadow py-2">
                  <p class="text-gray-800 text-base px-6 mb-5">General Rieekan thinks it's dangerous for any ships to leave the system until we've activated the energy shield. That's a good story. I think you just can't bear to let a gorgeous guy like me out of your sight</p>
                  <p class="text-gray-500 text-xs md:text-sm px-6">Mostapha labdaoui</p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </body>
  </div>
<Footer />
</template>
<script>
import NavBar from '@/components/navBar/NavBar.vue';
import Footer from '@/components/footer/Footer.vue';
import SubNavBar from '@/components/navBar/SubNavBar.vue';

export default{
  name: 'AboutView',
  components: {
    NavBar,
    Footer,
    SubNavBar
},
}

</script>
