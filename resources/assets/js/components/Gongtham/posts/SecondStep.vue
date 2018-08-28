<template>
<el-form :model="model" :rules="rules" ref="form">

   <el-form-item label="รายละเอียดย่อ..." prop="summary">
 
    <el-row style="margin-top:35px;">
      <el-col :span="24">
         <vue-editor id="editor1" v-model="model.summary"  :editorOptions="editorSummary"  type="text"> </vue-editor >
      </el-col>
    </el-row>
  </el-form-item>

  <el-form-item label="เนื้อหาข่าว" prop="">
       <el-row style="margin-top:35px;">
      <el-col :span="24">
      <vue-editor  id="editor2"
      :customModules="customModulesForEditor"
      :editorOptions="editorSettings"
      useCustomImageHandler
      @imageAdded="handleImageAdded" 
      v-model="model.content" required>
    </vue-editor>
      </el-col>
    </el-row>
  </el-form-item>

</el-form>
</template>

<script>
 import {VueEditor, Quill} from 'vue2-editor'
  import { ImageDrop } from 'quill-image-drop-module'
  import ImageResize from 'quill-image-resize-module'

export default {
    components: {
  
      VueEditor
    },
  data(){
		return {
        //  content: '<h1>Initial Content</h1>',
        customModulesForEditor: [
          { alias: 'imageDrop', module: ImageDrop },
          { alias: 'imageResize', module: ImageResize }
        ],
        editorSettings: {
          modules: {
            imageDrop: true,
            imageResize: {}
          }
        },
        editorSummary :{
  modules: {
            toolbar: [
              [{ 'size': ['small', false, 'large', 'huge'] }],
               ['bold', 'italic', 'underline', 'strike'],
              [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                  [{ 'indent': '-1' }, { 'indent': '+1' }],
                   [{ 'color': [] }, { 'background': [] }],
             
            ],
  }
        },
      model: {
        language: '',
        website: '',
        content:'',
        summary:''
      },
     
      rules: {
        language: [{
          required: true,
          message: 'Language name is required',
          trigger: 'change'
        }],
         website: [{
          required: true,
          message: 'Website is required',
          trigger: 'blur'
        }],
           summary: [{
          required: true,
          message: 'Website is required',
          trigger: 'blur'
        },
        {
          // type: 'url',
          // message: 'Invalid url',
          // trigger: 'change'
        }],
      }
	}},
  methods: {
    validate() {
      return new Promise((resolve, reject) => {
        this.$refs.form.validate((valid) => {
          this.$emit('on-validate', valid, this.model)
          resolve(valid);
        });
      })

    },
      handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {
        // An example of using FormData
        // NOTE: Your key could be different such as:
        // formData.append('file', file)

        var formData = new FormData();
        formData.append('image', file)

        axios({
          url: '/api/posts/images',
          method: 'POST',
          data: formData
        })
        .then((result) => {
          console.log(result);
          let url = result.data.url // Get url from response
          Editor.insertEmbed(cursorLocation, 'image', url);
          resetUploader();
        })
        .catch((err) => {
          console.log(err);
        })
      }
    
  }

}
</script>

<style>
.ql-picker-label {
  display: flex !important;
}
/* #editor1 {
    min-height: 80px;
  } */
  /* word-wrap:break-word แก้ปัญหา word หลุดกรอบ */
</style>
