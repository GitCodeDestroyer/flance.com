// Requiring bootstrap
import 'bootstrap'

import * as jQuery from 'jquery'
window.$ = window.jQuery = jQuery

import * as axios from 'axios'
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
