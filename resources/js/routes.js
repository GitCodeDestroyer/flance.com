let Home = () => import('./components/Home'),
    About = () => import('./components/About'),
    Projects = () => import('./components/Projects'),
    MyProjects = () => import('./components/MyProjects'),
    ViewProject = () => import('./components/ViewProject')

export const router = {
    // linkActiveClass: 'bold',
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/about',
            component: About,
            name: 'about'
        },
        {
            path: '/projects',
            component: Projects,
            name: 'projects'
        },
        {
            path: '/my-projects',
            component: MyProjects,
            name: 'my-projects'
        },
        {
            path: '/projects/:id',
            component: ViewProject,
            name: 'view-projects'
        }
    ]
}
