<template>
    <section>
        <Navbar></Navbar>
        <div class="alert alert-success" role="alert" v-if="flash.success">
          <strong>Hurray!</strong> {{flash.success}}
        </div>

        <article class="alert alert-danger" role="alert" v-if="flash.error">
            <strong>Dang it!</strong> {{flash.error}}
        </article>
      <router-view></router-view>
      <Footer></Footer>
  </section>
</template>

<script>
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';
import flashMessage from './helpers/flashMessage';

export default {
    data() {
        return {
            flash: flashMessage.state
        }
    },
    components: {
      Navbar,
      Footer
    }
}
</script>
