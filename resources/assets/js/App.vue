<template>
    <div>
        <Navbar></Navbar>
        <article class="message is-success" v-if="flash.success">
          <div class="message-header">
            <h1>{{flash.success}}</h1>
          </div>
        </article>

        <article class="message is-danger" v-if="flash.error">
          <div class="message-header">
            <h1>{{flash.error}}</h1>
          </div>
      </article>
      <router-view></router-view>
      <Footer></Footer>
    </div>
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
