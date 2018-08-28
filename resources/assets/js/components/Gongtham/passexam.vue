<template>





    <div class="table-responsive " style="padding:30px;">
        <!-- <b-alert variant="success" show>Success Alert</b-alert> -->
        <el-search-table-pagination stripe border fit type="local" :data="displayData" :page-sizes="[5,10,25,50,100]" :columns="columns"
            pagination-layout="total, sizes, prev, pager, next, jumper" :form-options="formOptions" table-style="width:100%;margin-top:10px;">
        </el-search-table-pagination>

    </div>

</template>




<script>
    import axios from 'axios';



    window.axios = axios;
    export default {

        created: function () {
            this.getUsers();
        },
  

        data() {
            return {
                passexam: [],
                passed: [],
                pass: [],
                columns: [

                    {
                        prop: 'SN',
                        label: 'เลขใบประกาศ',
                        align: 'center',
                        sortable: true
                    },
                    {
                        prop: 'stuPrefix',
                        label: 'คำนำหน้า',
                        width: '100',
                        align: 'center'
                    },
                    {
                        prop: 'stuName',
                        label: 'ชื่อ',
                        align: 'center'
                    },
                    {
                        prop: 'stuLastName',
                        label: 'นามสกุล',
                        align: 'center'
                    },
                    {
                        prop: 'stuOrg',
                        label: 'สถานศึกษา',
                        align: 'center'
                    },
                    {
                        prop: 'orgAmphur',
                        label: 'อำเภอ',
                        align: 'center'
                    },
                    {
                        prop: 'stuSNR',
                        label: 'จังหวัด',
                        align: 'center'
                    },
                    {
                        prop: 'examYear',
                        label: 'ปีที่สอบได้',
                        align: 'center'
                    },
                    // render: row => {
                    //   const { sex } = row
                    //   return sex === 0 ? 'Male' : sex === 1 ? 'Female' : 'Unknow'
                    // } 
                ],

                formOptions: {
                    inline: true,
                    fuzzy: true,
                    submitBtnText: 'ค้นหา',
                    resetBtnText: 'รีเซ็ต',
                    showResetBtn: true,
                    forms: [{
                            prop: 'SN',
                            label: 'เลขใบประกาศ',
                            placeholder: 'ใส่ข้อมูล',
                            labelWidth: '100',
                            itemWidth: '150'
                        },
                        {
                            prop: 'stuName',
                            label: 'ชื่อ',
                            labelWidth: '100',
                            itemWidth: '150'
                        },
                        {
                            prop: 'stuLastName',
                            label: 'นามสกุล',
                            labelWidth: '100',
                            itemWidth: '150'
                        },
                        {
                            prop: 'stuOrg',
                            label: 'สถานศึกษา',
                            labelWidth: '100',
                            itemWidth: '150'
                        },
                        {
                            prop: 'examYear',
                            label: 'ปีที่สอบได้',
                            itemType: 'select',
                            options: [{
                                    value: 2560,
                                    label: '2560'
                                },
                                {
                                    value: 2559,
                                    label: '2559'
                                },
                                {
                                    value: 2558,
                                    label: '2558'
                                },
                                {
                                    value: 2557,
                                    label: '2557'
                                },
                                {
                                    value: 2556,
                                    label: '2556'
                                },
                                {
                                    value: 2555,
                                    label: '2555'
                                },
                                {
                                    value: 2554,
                                    label: '2554'
                                },
                                {
                                    value: 2553,
                                    label: '2553'
                                },
                                {
                                    value: 2552,
                                    label: '2552'
                                },
                                {
                                    value: 2551,
                                    label: '2551'
                                }
                            ],
                            labelWidth: '100',
                            itemWidth: '150'
                        }
                    ]
                },


            }
        },
        methods: {
            getUsers: function () {
                axios.get('/api/Passexam')
                    .then(response => {
                        // console.log(JSON.stringify(response.data.Passexam))
                        this.pass = response.data.Passexam;

                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            handleCurrentChange(current_page) {
                this.currentPage = current_page;
                //   console.log(`current page: ${current_page}`);
            }


        },
        computed: {

            displayData() {
                if (!this.pass || this.pass.length === 0) return [];
                return this.pass



            },

        }

    }
</script>

<style lang="scss" scoped>
    .el-pagination {
        white-space: normal;
    }
</style>