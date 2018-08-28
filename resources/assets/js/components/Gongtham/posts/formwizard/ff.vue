<template>
<div id="formall">  
    <form action="#" @submit.prevent="createTask()" enctype="multipart/form-data" class="formedit">

 
      <div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <el-form :model="model" :rules="rules" ref="form">
    <el-form-item label="หัวข้อข่าว" prop="title">
        
      <el-input v-model="model.title" placeholder="First name" id="title" ></el-input>
        <!-- {{slug}} -->
    </el-form-item>
  
    <el-form-item label="slug" prop="slug">
    
      <el-input placeholder="Please input" v-model="model.slug">
      <template slot="prepend">Http://localhost/posts/</template>
    </el-input>
    </el-form-item>
    
    <el-form-item label="สถานะ : " prop="active">
   <el-switch
    style="display: block"
    v-model="model.active"
    active-color="#13ce66"
    inactive-color="#ff4949"
    active-text="เปิดเผย"
    inactive-text="ซ่อนข่าว">
  </el-switch>
    </el-form-item>
  </el-form>
</div>

   
            <!-- <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12 "> -->

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
                  <div class="hello">    
    <picture-input 
    name="image"
      ref="pictureInput" 
      @change="onChange" 
      width="300" 
      height="300" 
      margin="10" 
      accept="image/jpeg,image/png" 
      size="10" 
      buttonClass="btn btn-sucess"
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
  </div></div>





             
        </div>
        <div align="center"><button type="submit" class="btn btn-default">ส่งข้อมูล</button></div>
        
    </form>
<!-- <vue-recaptcha sitekey="6Lev1WkUAAAAAOYUYkvXyAhGgXjF1XxCwz10SODc"></vue-recaptcha> -->
</div>


</template>

<script>
  import VueRecaptcha from 'vue-recaptcha';

import PictureInput from 'vue-picture-input'


    import axios from 'axios';
 
    export default {
        created: function () {

        },
        data() {
            return {
    model: {
        title: '',
        slug: '',
        active: false,
         
      },
      rules: {
        title: [{
          required: true,
          message: 'First name is required',
          trigger: 'blur'
        }],
        slug: [{
          required: true,
          message: 'Last name is required',
          trigger: 'blur'
        }],
      
      },
              
                image: null,
        //    removeImage2: false,


            }
            
        },
//  props: ['masked'],
        components: {
  PictureInput,
  VueRecaptcha 

        },
        watch: {
    // ใช้ watch จับการแก้ไขข้อมูล
    'model.title' : function()
    {
        // console.log('value changed from ' + oldVal + ' to ' + newVal);
        this.model.slug = this.sanitizeTitle(this.model.title) 
    }
},

        methods: {
          
            sanitizeTitle()  {
             var slug = "";
      // Change to lower case
      var titleLower = this.model.title.toLowerCase();
      // Letter "e"
      slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
      // Letter "a"
      slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
      // Letter "o"
      slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
      // Letter "u"
      slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
      // Letter "d"
      slug = slug.replace(/đ/gi, 'd');
      // Trim the last whitespace
      slug = slug.replace(/\s*$/g, '');
      // Change whitespace to "-"
      slug = slug.replace(/\s+/g, '-');
       
      return this.test = slug;
                },
    validate() {
      return new Promise((resolve, reject) => {
        this.$refs.form.validate((valid) => {
          this.$emit('on-validate', valid, this.model)
          resolve(valid);
        });
      })

    },
onChange (image) {
      // console.log('New picture selected!')
        //  console.log(this.$refs.pictureInput);
      if (image) {
        // console.log('Picture loaded.')
        //  this.$refs.PictureInput.remove;
        this.image = image
      } else {
        // console.log('FileReader API not supported: use the <form>, Luke!')
      }
    },
      
      submit(){
this.$refs.recaptcha.execute();

      },

            createTask() {
                let red = this;
                // var form = document.querySelector("#formedit");
                var data = new FormData();
                // เรียกผ่านชื่อ และฝังดาต้าไว้ใน append data
                data.append('title', this.model.title);
            data.append('slug', this.model.slug);
                // data.append('images', this.image);
                // formdata.append('_token', this.token); // just the csrf token
                // console.log(formdata);
                axios.post('/admin/posts', data,
                 {       xsrfCookieName: 'csrftoken',
                         xsrfHeaderName: 'X-CSRFToken',
                            headers: {'X-Requested-With':'XMLHttpRequest','Content-Type': 'multipart/form-data'}})
                    .then((res) => {
                         
                        this.formErrors = [];
                     
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