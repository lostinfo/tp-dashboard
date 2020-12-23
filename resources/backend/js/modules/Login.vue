<template>
  <div class="container">
    <div class="lang"></div>
    <div class="content">
      <div class="top">
        <div class="header">
          <img :src="app_logo" class="logo" alt="">
          <span class="title">{{app_name}}</span>
        </div>
        <div class="desc">welcome to {{app_name}}</div>
      </div>
      <div class="main">
        <div class="login-wrapper">
          <el-form :model="loginForm" :rules="loginRules" ref="loginRef" label-positin="left" label-width="0px"
                   class="login-form">
            <el-form-item prop="username">
              <el-input type="text" v-model="loginForm.username" auto-complete="off" prefix-icon="el-icon-user"
                        placeholder="用户名" :autofocus="true"></el-input>
            </el-form-item>
            <el-form-item prop="password">
              <el-input type="password" v-model="loginForm.password"
                        @keyup.native.13="loginFormSubmit('loginRef')"
                        auto-complete="off" prefix-icon="el-icon-lock" placeholder="密码"></el-input>
            </el-form-item>
            <!--<el-checkbox v-model="loginForm.remember">Remember me</el-checkbox>-->
            <el-form-item>
              <el-button type="primary" class="login-btn" style="width: 100%;"
                         @click.native.prevent="loginFormSubmit('loginRef')"
                         :loading="logining">
                登录
              </el-button>
            </el-form-item>
          </el-form>
        </div>
      </div>
    </div>
    <page-footer></page-footer>
  </div>
</template>

<script type="text/ecmascript-6">

import {app_logo, app_name} from "../config/app"

export default {
  name: 'Login',
  data() {
    return {
      logining: false,
      loginForm: {
        username: '',
        password: '',
      },
      loginRules: {
        username: [
          {required: true, message: '请输入用户名', trigger: 'blur'},
        ],
        password: [
          {required: true, message: '请输入密码', trigger: 'blur'},
        ]
      },
      app_logo: app_logo,
      app_name: app_name,
    }
  },
  methods: {
    loginFormSubmit(ref) {
      let that = this
      that.$refs[ref].validate((valid) => {
        console.log(valid)
        if (!valid) {
          console.log("submit error")
          return false
        }
        that.logining = true
        that.axios.post('/login', that.loginForm).then(res => {
          that.$store.commit('setAdmin', res.admin)
          that.$store.commit('setAuthorization', res.authorization)
          that.$message.success('登录成功')
          setTimeout(function () {
            that.$router.push({path: '/admin/index'})
          })
          that.logining = false
        }).catch(err => {
          that.logining = false
        })
      })
    }
  }
}
</script>

<style scoped>
.container {
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  background-image: url("https://gw.alipayobjects.com/zos/rmsportal/TVYTbAXWheQpRcWDaDMu.svg");
  background-repeat: no-repeat;
  background-position: center 110px;
  background-size: 100%;
}

.lang {
  width: 100%;
  height: 40px;
  line-height: 44px;
  text-align: right;
}

.content {
  padding: 32px;
  flex: 1 1;
}

.top {
  text-align: center;
}

.header {
  height: 44px;
  line-height: 44px;
}

.logo {
  height: 44px;
  margin-right: 16px;
  vertical-align: top;
}

.title {
  position: relative;
  top: 2px;
  color: rgba(0, 0, 0, 0.85);
  font-weight: 600;
  font-size: 33px;
  font-family: Avenir, 'Helvetica Neue', Arial, Helvetica, sans-serif;
}

.desc {
  margin-top: 12px;
  margin-bottom: 40px;
  color: rgba(0, 0, 0, 0.45);
  font-size: 14px;
}

.main {
  width: 368px;
  margin: 0 auto;
}


.login-wrapper {
  max-width: 360px;
  width: 100%;
  padding: 20px;
  color: #333333;
}

.login-form {
  width: 100%;
}
</style>
