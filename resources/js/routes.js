export default [
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/order', component: require('./components/Order.vue').default },
  { path: '/user', component: require('./components/User.vue').default },
  { path: '*', component: require('./components/Dashboard.vue').default },
];