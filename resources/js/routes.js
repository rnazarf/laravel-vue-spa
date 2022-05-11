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
    path: '/payment',
    component: require('./components/Payment.vue').default,
    meta: {
      breadcrumb: 'Payment'
    }
  },
  {
    path: '/voucher',
    component: require('./components/Voucher.vue').default,
    meta: {
      breadcrumb: 'Voucher'
    }
  },
  {
    path: '/product',
    component: require('./components/Product.vue').default,
    meta: {
      breadcrumb: 'Product'
    }
  },
  {
    path: '/subcategory',
    component: require('./components/Subcategory.vue').default,
    meta: {
      breadcrumb: 'Sub Category'
    }
  },
  {
    path: '*',
    component: require('./components/404.vue').default,
    meta: {
      breadcrumb: 'Not Found'
    }
  },
];