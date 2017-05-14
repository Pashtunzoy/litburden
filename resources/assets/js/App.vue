<template>
    <section>
        <Navbar></Navbar>
        <article class="alert alert-success" v-if="flash.success">
            {{flash.success}}
        </article>

        <article class="alert alert-danger" v-if="flash.error">
            {{flash.error}}
        </article>
      <router-view></router-view>
      <Footer></Footer>
  </section>
</template>

<script>
    import flashMessage from './helpers/flashMessage';

    export default {
        data() {
            return {
                flash: flashMessage.state
            }
        }
    }
</script>
