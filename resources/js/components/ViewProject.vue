<template>
    <div>
        <div v-show="error">Cannot connect to the server or you signed out</div>
        <h1>{{ project.title }}</h1>
        <p>{{ project.content }}</p>
        <h3>Comments</h3>
        <ul>
            <app-comment v-for="comment in comments" :key="comment.id" :owner="comment.comment_owner_id" :body="comment.body"></app-comment>
            <li v-show="!comments">There are no comments...</li>
            <form @submit.prevent="submit()" id="comment" :action="this.id + '/comments'" method="POST">
                <div class="mt-5 form-group">
                    <input type="hidden" name="_token"  v-model="post_comment.csrf_token">
                    <input type="text" id="body" name="body" class="col-md-6 form-control" placeholder="Add a comment..." v-model="post_comment.body">
                    <button class="mt-2 submit-btn btn btn-primary col-md-2 form-control">Add</button>
                </div>
            </form>
        </ul>
    </div>
</template>

<script>
    import AppComment from './layouts/Comment'

    export default {
        data() {
            return {
                project: false,
                comments: false,
                id: this.$route.params.id,
                post_comment: {
                    body: '',
                    csrf_token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                error: false
            }
        },
        components: {
            AppComment
        },
        methods: {
            submit() {
                axios.post(`http://flance.com/projects/${this.id}/comments`, this.post_comment)
                     .then(res => {
                         this.comments.push(res.data)
                         this.post_comment.body = ''
                     })
                     .catch(error => {
                         this.error = true
                     })
            }
        },
        created() {
            axios.get(`http://flance.com/api/projects/${this.id}`)
            .then(res => {
                this.project = res.data[0]
                this.comments = res.data[1]
            })
            .catch(error => {
                this.error = true
            })
        }
    }
</script>
