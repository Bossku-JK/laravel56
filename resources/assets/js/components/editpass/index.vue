<template>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


            <h2 class="text-center" style="margin-top:30px;">รายการ ขอแก้ไขนักธรรม-ธรรมศึกษา</h2>


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        

                        <table  class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>เลขที่-ปกศ</th>
                                    <th>ขอแก้ไข</th>
                                    <th>สถานะการดำเนินการ</th>
                                    <th>วันที่ส่งเรื่อง</th>
                                    <th>เอกสาร</th>

                                </tr>
                            </thead>
                            <tbody>
                           
                                    <!-- <tr v-if="loading">กกก</p> -->
                                    
                                <tr v-if="editupdate.length == 0">
                                    <td colspan="6" class="text-center">ไม่พบข้อมูล</td>
                                </tr>
                                <tr v-else v-for="(item, index)  in editupdate" :key='item.id'>
                                    <td>{{ index+1 }}</td>
                                    <td>
                                        <i class="fa fa-search"></i>
                                        <a :href="'http://gongtham.net/?sn='+ item.number_pks" target="_blank">
                                            <span class="badge badge-pill badge-default">{{ item.number_pks }}</span>
                                        </a>
                                    </td>
                                    <td>

                                        <span class="badge badge-pill badge-default" v-show="item.prefix">คำนำหน้า</span>
                                        <span class="badge badge-pill badge-primary" v-show="item.name">ชื่อ</span>
                                        <span class="badge badge-pill badge-success" v-show="item.lastname">นามสกุล</span>
                                        <span class="badge badge-pill badge-info" v-show="item.monkname">ฉายา</span>
                                        <span class="badge badge-pill badge-warning" v-show="item.birthday != '0000-00-00' && item.birthday !== null">วันเกิด</span>
                                        <span class="badge badge-pill badge-warning" v-show="item.birth_monkday != '0000-00-00' && item.birth_monkday !== null">วันบวช</span>
                                        <span class="badge badge-pill badge-danger" v-show="item.schoolname">ชื่อสถานศึกษา</span>
                                        <span class="badge badge-pill badge-danger" v-show="item.watname">ชื่อวัดที่สังกัด</span>

                                    </td>

                                    <td v-if="item.status == 0">
                                        <h5>
                                            <span class="badge badge-pill badge-danger">รอการดำเนินการ</span>
                                        </h5>
                                    </td>
                                    <td v-else>
                                        <h5>
                                            <span class="badge badge-pill badge-success">ดำเนินการเสร็จสิ้น</span>
                                        </h5>
                                    </td>
                                    <td>
                                        <span v-if="item.created_at !==null && item.created_at!==undefined">{{ item.created_at | moment("from", "now") }}</span>


                                    </td>
                                    <td>
                                        <div v-if="item.ppt2!==undefined && item.ppt2!=null">แนบเอกสาร</div>
                                        <div v-else>ไม่แนบเอกสาร</div>
                                        <!-- <div v-if="item.ppt2!==undefined && item.ppt2!=null">
                                            <img v-bind:src="'http://gongtham.loc/project1/public/images/'+ item.ppt2.name" width="200">
                                        </div>
                                        <div v-else>ไม่มีพบเอกสาร</div> -->
                                    </td>

                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>



            <editpass-create @createNew="getAll"></editpass-create>
        </div>
    </div>



</template>
<script src="cleave.min.js"></script>
<script>
    import axios from 'axios';
    import Cleave from 'vue-cleave-component';
    import store from '../../store/index';
    import {
        mapState,
        mapActions,
        mapGetters
    } from 'vuex';
    // Vue.component('music-genre-id', MusicGenreId);

    var datos = "/editpass"
    export default {




        computed: {
            // created() {
       
            //     this.loading = true
            //     store.dispatch('getAll')
            //         .then(() => {
            //             console.log('ได้ข้อมูลแล้ว')
            //             this.loading = false;
            //         })
            // },
            // ...mapGetters({
            //     wps: 'wps'
            // }),
            // ...mapState([
            //     'updatepsn',

            // ]),
            editupdate(){
                return this.$store.state.editpass.updatepsn
            }
        
        },
        data() {
            return {
                loading: false,


            }
        },


        components: {
            //   Cleave
        },
        methods: {

            //          get() {
            //               this.loading = true;

            //       this.getAll()

            //         .then(() => {
            //           return  this.Lists = this.updatepsn;
            //              this.loading = false;

            //         })


            //   },

            ...mapActions([
                'getAll',

            ]),
            // getUsers: function () {
            //      let red = this;
            //     axios.get('/api/editpass')
            //         .then(response => {
            //             // console.log(JSON.stringify(response.data.Updatepsn))
            //             this.list = response.data.Updatepsn.data;
            //             red.cre = true;
            //         })
            //         .catch(function (error) {
            //             console.log(error)
            //         })
            // },

        },


        mounted() {
            this.getAll();
        }


    }
</script>