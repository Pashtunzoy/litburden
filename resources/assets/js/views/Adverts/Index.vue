<template v-if="authentic">
  <div id="container">
    <h1>From Index</h1>
  </div>
</template>

<script>
    import auth from '../../store/auth';

    export default {
      data: function data() {
        return {
            auth: auth.state
        }
      },
      computed: {
          authentic() {
              if (auth.api_token && auth.user_id) {
                  return true;
              }
              return false;
          }
      }
    }
</script>
