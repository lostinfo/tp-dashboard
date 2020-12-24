<template>
  <el-row>
    <el-card class="view-card">
      <el-form :model="adminModel" :rules="adminRules" ref="formRef" label-width="120px" v-loading="formLoading">
        <el-form-item label="管理员用户名" prop="username">
          <el-input v-model="adminModel.username" :disabled="id !== null"></el-input>
        </el-form-item>
        <el-form-item label="密码" prop="password">
          <el-input v-model="adminModel.password"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button @click="submitClose">取消</el-button>
          <el-button type="primary" @click="submit">提交</el-button>
        </el-form-item>
      </el-form>
    </el-card>
  </el-row>
</template>

<script>
  export default {
    name: "Admin",
    data() {
      return {
        formLoading: false,
        id: null,
        adminModel: {
          username: '',
          password: '',
        },
        adminRules: {
          username: [
            {required: true, message: '请输入管理员用户名', trigger: 'blur'}
          ],
          password: [
            {required: true, message: '请输入密码', trigger: 'blur'}
          ],
        },
      }
    },
    created() {

    },
    mounted() {
      if (this.$route.params.hasOwnProperty('id')) {
        this.id = this.$route.params.id
        this.getAdmin()
      }
    },
    methods: {
      getAdmin() {
        let that = this
        that.formLoading = true
        that.axios.get('/admin/' + that.id).then(res => {
          that.formLoading = false
          that.adminModel = {
            id: res.id,
            username: res.username,
            password: '',
          }
        }).catch(err => {
          that.formLoading = false
        })
      },
      submitClose() {
        let that = this
        that.$router.back()
      },
      submit() {
        let that = this
        that.formLoading = true
        that.$refs.formRef.validate((valid) => {
          if (!valid) {
            that.formLoading = false
            return false
          }
          that.axios.post('/admin', that.adminModel).then(res => {
            that.formLoading = false
            that.$message.success('提交成功')
            setTimeout(function () {
              that.$router.replace('/admin/admins')
            }, 2000)
          }).catch(err => {
            that.formLoading = false
          })
        })
      },
    },
  }
</script>

<style>

</style>
