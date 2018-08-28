<template>




</template>

<script>
    import axios from 'axios';



    var datos = "http://gongtham.loc/project1/public/editpass"
    export default {
        created: function () {
            this.getUsers();
        },
        data() {
            return {
                image: null,
                list: [],
                task: {
                    id: '',
                    number_pks: '',
                    number_kss: '',
                    prefix: '',
                    name: '',
                    lastname: '',
                    monkname: '',
                    birthday: '',
                    birth_monkday: '',
                    school_name: '',
                    wat_name: '',
                    etc: '',
                    contact: '',
                    file: '',
                },

            }
        },


        methods: {

            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                // console.log(files);
                console.log(files[0])
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            removeImage: function (e) {
                const input = this.$refs.fileupload;
                input.type = 'text';
                input.type = 'file';
                this.image = null;
            },
            getUsers: function () {
                axios.get('http://gongtham.loc/project1/public/editpass')
                    .then(response => {
                        console.log(JSON.stringify(response.data.Updatepsn))
                        this.list = response.data.Updatepsn;
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            createTask() {

                axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
                let red = this;
                var form = document.querySelector('form');
                var formdata = new FormData(form);
                console.log(formdata);
                axios.post('http://gongtham.loc/project1/public/editpass', formdata, {
                        xsrfCookieName: 'csrftoken',
                        xsrfHeaderName: 'X-CSRFToken',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((res) => {
                        this.formErrors = [];
                        this.task.number_pks = '',
                            this.task.number_kss = '',
                            this.task.prefix = '',
                            this.task.name = '',
                            this.task.lastname = '',
                            this.task.monkname = '',
                            this.task.birthday = '',
                            this.task.birth_monkday = '',
                            this.task.school_name = '',
                            this.task.wat_name = '',
                            this.task.etc = '',
                            this.task.contact = '',
                            this.task.file = '',
                            this.image = null;
                        const input = this.$refs.fileupload;
                        input.type = 'text';
                        input.type = 'file';


                        this.edit = false;
                        this.getUsers();

                    })
                    .catch(function (error) {
                        if (error.response) {
                            red.formErrors = error.response.data.errors;
                        }
                    });
            },
        },
        componets: {
            // 'todo-item':{}
        },

    }
</script>