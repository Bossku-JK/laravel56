<template>
<div>  
    <form action="#" @submit.prevent="createTask()" enctype="multipart/form-data" class="formedit">
        <div class="row">
            <!-- <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12 "> -->

            <div class="col-xs-6 col-sm-6 col-md-6  col-lg-6 ">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                    <label for="exampleInputEmail1">เลขที่ใบประกาศ(ตัวอย่าง: กท 1555/4584)</label>
               
     
                     <the-mask mask="## AAAA/AAAA" name="number_pks"  masked  class="form-control" v-model="task.number_pks" type="text" :tokens="hexTokens" placeholder="ตัวอย่าง: กท 1555/4584" required/>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                    <label for="exampleInputEmail1">เลขที่บัตรประจำตัวประชาชน 13 หลัก</label>
               
                      <the-mask class="form-control" name="number_kss" masked v-model="task.number_kss" type="text" :tokens="hexss" placeholder="เลขที่บัตรประจำตัวประชาชน" mask="# #### ##### ## #"  required/>
                </div>

                <div class="form-group">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputEmail1">คำนำหน้า</label>
                        <input type="text" class="form-control" id="1" placeholder="คำนำหน้า" name="prefix" v-model="task.prefix">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">ชื่อ</label>
                        <input type="text" class="form-control" id="2" placeholder="ชื่อ" name="name" v-model="task.name">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">นามสกุล</label>
                        <input type="text" class="form-control" id="3" placeholder="นามสกุล" name="lastname" v-model="task.lastname">
                    </div>

                    <hr>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">ข้อมูลติดต่อ</label>
                        <input type="text" class="form-control" id="4" placeholder="ข้อมูลติดต่อ" name="contact" v-model="task.contact" required>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">อื่นๆ (กรุณาระบุ)</label>
                        <input type="text" class="form-control" id="5" placeholder="อื่นๆ (กรุณาระบุ)" name="etc" v-model="task.etc">
                    </div>

                </div>


            </div>
            <div class="col-xs-6 col-sm-6 col-md-6  col-lg-6 ">
                <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">ฉายา</label>
                        <input type="text" class="form-control" id="6" placeholder="ฉายา" name="monkname" v-model="task.monkname">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">วัน/เดือน/ปีเกิด</label>
                        <input type="date" class="form-control" id="7" placeholder="วัน/เดือน/ปีเกิด" name="birthday" v-model="task.birthday">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">วัน/เดือน/ปี อุปสมบท</label>
                        <input type="date" class="form-control" id="8" placeholder="วัน/เดือน/ปี อุปสมบท" name="birth_monkday" v-model="task.birth_monkday">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">ชื่อโรงเรียน</label>
                        <input type="text" class="form-control" id="9" placeholder="ชื่อโรงเรียน" name="school_name" v-model="task.school_name">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:10px;">
                        <label for="exampleInputPassword1">ชื่อสังกัดวัด</label>
                        <input type="text" class="form-control" id="10" placeholder="ชื่อสังกัดวัด" name="wat_name" v-model="task.wat_name">
                       
                    </div>
                    <hr>
                  <div class="hello">    
    <picture-input 
    name="image"
      ref="pictureInput" 
      @change="onChange" 
      width="300" 
      height="300" 
      margin="16" 
      accept="image/jpeg,image/png" 
      size="10" 
      buttonClass="btn btn-primary"
      :removable="true"
      removeButtonClass="btn"
      :customStrings="{
           change: 'เปลี่ยนรูปภาพ', // Text only
        upload: '<h1>Bummer!</h1>',
        remove: 'ลบรูปภาพนี้', // Text only
         select: 'เลือกรูปภาพ', // Text only
        drag: 'คลิก 🔎 เพื่ออัพโหลดรูปภาพ'
      }">
    </picture-input>
  </div>
<br>
                    <p class="help-block">สำเนาบัตรประจำตัวประชาชน / เอกสารการเปลี่ยนชื่อ / สำเนาใบสุทธิ. / ยกเว้นเปลี่ยน ชื่อโรงเรียน / สังกัดวัด</p>
                    <hr>




                </div>
            </div>

        </div>
        <div align="center"><button type="submit" class="btn btn-default">ส่งข้อมูล</button></div>
        
    </form>
<!-- <vue-recaptcha sitekey="6Lev1WkUAAAAAOYUYkvXyAhGgXjF1XxCwz10SODc"></vue-recaptcha> -->
</div>


</template>

<script>
 
import VueTheMask from 'vue-the-mask'
import PictureInput from 'vue-picture-input'
Vue.use(VueTheMask)

    import axios from 'axios';
 
    export default {
        created: function () {

        },
        data() {
            return {
   
              
                image: null,
        //    removeImage2: false,
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
                    image: '',

                },
hexTokens: {
 '#': {pattern: /[ก-ฮ]/},  // ก-๙ ทั้งหมด
 'A': {pattern: /[0-9]/},
},
hexss: {

 '#': {pattern: /[0-9]/},
}

            }
            
        },
//  props: ['masked'],
        components: {
  PictureInput
        },
        methods: {
onChange (image) {
      console.log('New picture selected!')
        //  console.log(this.$refs.pictureInput);
      if (image) {
        console.log('Picture loaded.')
        //  this.$refs.PictureInput.remove;
        this.image = image
      } else {
        console.log('FileReader API not supported: use the <form>, Luke!')
      }
    },
      
      submit(){
// this.$refs.recaptcha.execute();

      },

            createTask() {
                let red = this;
                var form = document.querySelector('.formedit');
                var formdata = new FormData(form);
                formdata.append('_token', this.token); // just the csrf token
                // console.log(formdata);
                axios.post('/api/editpass', formdata,
                 {       xsrfCookieName: 'csrftoken',
                         xsrfHeaderName: 'X-CSRFToken',
                            headers: {'X-Requested-With':'XMLHttpRequest','Content-Type': 'multipart/form-data'}})
                    .then((res) => {
                         console.log(res)
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
                            this.image = '';
                             this.$emit('createNew');
                                    //  เรียกใช้ function แล้วระบุ function ex: <editpass-create @updateNotes="getUsers"></editpass-create> เพิ่ม component ในส่วน index
                                this.$refs.pictureInput.removeImage();
                                //คำสั่ง this.$refs.pictureInput.removeImage(); เรียกใช้ function ใน component pictureinput remove มาใช้งาน
                

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