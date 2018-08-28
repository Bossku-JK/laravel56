<template>

  <div>
    <!-- validate-on-back  คำสั่ง ตรวจเวลากลับ -->

    <form-wizard @on-complete="onComplete" ref="wizard" :start-index.sync="activeTabIndex" shape="circle" color="#20a0ff" error-color="#ff4949"
      nextButtonText="ต่อไป" backButtonText="กลับ" finishButtonText="บันทึกข้อมูล" title="เพิ่มข่าวสารใหม่" subtitle="กรอกข้อมูลและตรวจสอบข้อมูล">
      <tab-content title="ขั้นตอนที่ ๑ กรอกชื่อข่าว และตั้งค่าต่างๆ" icon="fas fa-users" :before-change="() => validate('firstStep')">

        <first-step ref="firstStep" @on-validate="onStepValidate"></first-step>


        <!-- <el-button @click="forceClearError">Try to clear the error</el-button> -->

      </tab-content>
      <tab-content title="ขั้นตอนที่ ๑ กรอกเนื้อหาข่าว" icon="fas fa-users" :before-change="() => validate('secondStep')">

        <second-step ref="secondStep" @on-validate="onStepValidate"></second-step>

      </tab-content>

      <tab-content title="Last step" icon="fas fa-users">

        <div class="card">
{{ finalModel }}
          <label>Upload Files</label>

          <input type="file" id="file" ref="file" v-on:change="fieldChange()" />

       
        </div>
          <div v-html="finalModel.summary"></div>
                   <div v-html="finalModel.content"></div>

      </tab-content>

    </form-wizard>

  </div>
</template>

<script>

  import FirstStep from "./FirstStep.vue";
  import SecondStep from "./SecondStep.vue";
// require styles

  import axios from 'axios';
  const quillModules = {
 
  imageDrop: true,
  imageResize: {}
}
  export default {
     
    props: ['uri'],
    components: {
      FirstStep,
      SecondStep,
 
    },
    data() {
      return {
    
      
        attachments: {},
        finalModel: {},
        activeTabIndex: 0,
        images: "",
        file: '',
        url: null,

      };
    },
    computed: {

      prettyJSON() {
        return this.finalModel;
      }
    },
    methods: {
    
      fieldChange(e) {
        this.file = this.$refs.file.files[0];
      },

      onComplete() {
        //  alert("Yay. Done!");
        const config = {
          headers: {
            xsrfCookieName: 'csrftoken',
            xsrfHeaderName: 'X-CSRFToken',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Content-Type': 'multipart/form-data'
            }
          }
        }
        // เรียกผ่านชื่อ และฝังดาต้าไว้ใน append data

        var data = new FormData();
        //แบบ หลายรูป
        for (let i = 0; i < this.attachments.length; i++) {
          data.append('pics', this.attachments[i]);
        }

           data.append('content', this.content);
        data.append('title', this.finalModel.title);
        data.append('slug', this.finalModel.slug);
        data.append('pic', this.file);
        // data.append('images', this.image);
        // formdata.append('_token', this.token); // just the csrf token
        // console.log(formdata);
        axios.post('/admin/posts', data, {
            xsrfCookieName: 'csrftoken',
            xsrfHeaderName: 'X-CSRFToken',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Content-Type': 'multipart/form-data'
            }
          })
          .then((res) => {
            // window.location.href = "../"
            console.log(res)

          })
          .catch(function (error) {
            if (error.response) {
              red.formErrors = error.response.data.errors;
            }
          });

      },
      forceClearError() {
        this.$refs.wizard.tabs[this.activeTabIndex].validationError = null;
      },
      validate(ref) {
        return this.$refs[ref].validate();
      },
      onStepValidate(validated, model) {
        if (validated) {
          this.finalModel = { ...this.finalModel,
            ...model
          };
        }
      }
    },
    mounted() {
    
    }

  }

</script>
<style>
 
  .ql-align-center{
 text-align: center
  }
   
  .ql-align-justify{
 text-align: justify
  }
   
  .ql-align-right{
 text-align: right
  }
   

</style>

<style lang="scss" scoped>
  .quill-editor,
  .quill-code {
    width: 50%;
    float: left;
  }

  .quill-code {
    height: auto;
    border: none;
    >.title {
      border: 1px solid #ccc;
      border-left: none;
      height: 3em;
      line-height: 3em;
      text-indent: 1rem;
      font-weight: bold;
    }
    >code {
      width: 100%;
      margin: 0;
      padding: 1rem;
      border: 1px solid #ccc;
      border-top: none;
      border-left: none;
      border-radius: 0;
      height: 30rem;
      overflow-y: auto;
    }
    
  }
  
</style>