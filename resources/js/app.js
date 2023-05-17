require('./bootstrap')

import { createApp } from 'vue'
import Test from './components/Test'

const app = createApp({})

app.component('test', Test)

app.mount('#app')
