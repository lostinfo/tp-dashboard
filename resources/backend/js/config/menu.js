export default [
    {
        group_name: '处理中心', pages: [
            '/admin/article/:id',
        ],
        menus: [
            {
                path: '/admin/index',
                name: '主页',
                icon: 'fa fa-home',
                unfolded: false
            },
            {
                path: '/admin/users',
                name: '用户管理',
                icon: 'fa fa-users',
                unfolded: false
            },
            {
                path: '/admin/articles',
                name: '文章管理',
                icon: 'fa fa-users',
                unfolded: false
            },
        ]
    },
    {
        group_name: '设置',
        menus: [
            {
                name: '权限管理',
                icon: 'fa fa-shield',
                unfolded: true,
                children: [
                    {
                        path: '/admin/admins',
                        name: '管理员列表',
                    },
                ]
            },
        ]
    },
]
