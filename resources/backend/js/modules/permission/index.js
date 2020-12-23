export default [
  {
    path: '/admin/admins',
    name: '管理员列表',
    component: () => import('./Admins.vue')
  },
  {
    path: '/admin/admin',
    name: '新增管理员',
    component: () => import('./Admin.vue')
  },
  {
    path: '/admin/admin/:id',
    name: '修改管理员',
    component: () => import('./Admin.vue')
  },
]