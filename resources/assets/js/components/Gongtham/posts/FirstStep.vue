<template>
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
</template>

<script>


export default {
    props : {
       
    },
  data(){
		return {
           
        test:'',
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
      
      }
    }},

    computed : {
          slug () {
     return this.sanitizeTitle(this.model.title)
    }
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

    }
  }

}
   
                $("#title").keyup(function () {
                    var str = removeAccents($(this).val())
                        .replace(/[^a-zA-Z0-9\sก-๙]/g, "")
                        .toLowerCase()
                        .replace(/\s/g, '-');
                    $("#permalink").val(str);
                });
</script>

<style>

</style>
