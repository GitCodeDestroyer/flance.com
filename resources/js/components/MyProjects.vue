<template>
    <div>
        <h1 v-on:click="deleteProject()">My Projects</h1>
        <a href="projects/create">Create a new Project!</a>
        <ul class="p-3 pt-5">
            <app-project v-for="(project, i) in projects" :key="project.id" :title="project.title" :path="pathes[i]"></app-project>
            <li v-show="!projects">There are no projects...</li>
        </ul>
    </div>
</template>

<script>
    import AppProject from './layouts/Project'

    export default {
        data() {
            return {
                projects: {},
                pathes: {}
            }
        },
        components: {
            appProject: AppProject
        },
        methods: {
            deleteProject() {
                this.projects.pop()
            }
        },
        created() {
            axios.get('http://flance.com/api/my-projects/')
                .then(res => {
                    this.projects = res.data[0]
                    this.pathes = res.data[1]
                })
                .catch(error => console.log(error))
        },
    }
</script>
