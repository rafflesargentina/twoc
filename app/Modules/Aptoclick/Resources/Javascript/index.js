
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue"
import VeeValidate from "vee-validate"
import VCalendar from "v-calendar"

import "bootstrap-select/dist/css/bootstrap-select.css"
import "leaflet/dist/leaflet.css"
import "magnific-popup/dist/magnific-popup.css"
import "swiper/dist/css/swiper.min.css"

import "bootstrap-select/dist/js/bootstrap-select.js"
import "leaflet/dist/leaflet.js"
import "magnific-popup/dist/jquery.magnific-popup.js"

window.noUiSlider = require("nouislider/distribute/nouislider.js")
window.SmoothScroll = require("smooth-scroll/dist/smooth-scroll.polyfills.js")
window.Swiper = require("swiper/dist/js/swiper.min.js")

Vue.use(VeeValidate)
Vue.use(VCalendar)

require("./router")
require("./store")

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context("./", true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split("/").pop().split(".")[0], (resolve) => resolve(files(key))))

