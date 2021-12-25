export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Laravel Nuxt JS',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '~/plugins/vform.js',
    '~/plugins/toast.js',
    // {src: '~/plugins/vform.js', mode: 'server'},
  ],


  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',

    // mandatory
    '@nuxtjs/auth-next'
  ],
  //nuxt auth package confi
  auth: {
    strategies: {
      local: {
        token: {
          property: 'access_token',
          global: true,
          // required: true,
          // type: 'Bearer'
        },
        user: {
          property: false,
          // autoFetch: true
        },
        endpoints: {
          login: { url: 'api/auth/login', method: 'post' },
          logout: { url: 'api/auth/logout', method: 'post' },
          register: { url: 'api/auth/register', method: 'post' },
          profile: { url: 'api/auth/profile', method: 'post' },
          user: { url: 'api/auth/me', method: 'post' },
        }
      }
    },
    redirect: {
      login: '/login',
      logout: '/',
      callback: '/login',
      home: '/'
    }
  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
      baseURL: 'http://127.0.0.1:8000/',
  },

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    manifest: {
      lang: 'en'
    }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}
