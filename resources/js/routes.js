export default [
  {
    path: '/home',
    component: require('./components/Dashboard.vue').default,
    meta: {
      breadcrumb: 'Home',
    }
  },
  {
    path: '/order',
    component: require('./components/Order.vue').default,
    meta: {
      breadcrumb: 'Order'
    }
  },
  {
    path: '/category',
    component: require('./components/Category.vue').default,
    meta: {
      breadcrumb: 'Category'
    }
  },
  {
    path: '/user',
    component: require('./components/User.vue').default,
    meta: {
      breadcrumb: 'User'
    }
  },
  {
    path: '/bank',
    component: require('./components/Bank.vue').default,
    meta: {
      breadcrumb: 'Bank'
    }
  },
  {
    path: '*',
    component: require('./components/Dashboard.vue').default
  },
];