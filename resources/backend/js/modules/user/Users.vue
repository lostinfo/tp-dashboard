<template>
  <el-row>
    <vue-table ref="table" :api-url="'/users'" show-paginate can-export :search-model="searchModel" :fields="fields"
               :item-actions="itemActions" @table-action="tableActions">
      <template slot="header-title">
        <span>用户列表</span>
      </template>
      <template slot="header-button">

      </template>
      <template slot="search-items">
        <el-form-item label="姓名" prop="name">
          <el-input
            placeholder="Name"
            v-model="searchModel.name">
          </el-input>
        </el-form-item>
        <el-form-item label="邮箱" prop="email">
          <el-input
            placeholder="Email"
            v-model="searchModel.email">
          </el-input>
        </el-form-item>
        <el-form-item label="手机号" prop="phone">
          <el-input
            placeholder="Phone"
            v-model="searchModel.phone">
          </el-input>
        </el-form-item>
        <el-form-item label="年龄" prop="age">
          <el-input
            placeholder="Age"
            v-model="searchModel.age">
          </el-input>
        </el-form-item>
        <el-form-item label="更多1" prop="more1">
          <el-input
            placeholder="more1"
            v-model="searchModel.more1">
          </el-input>
        </el-form-item>
        <el-form-item label="更多2" prop="more2">
          <el-input
            placeholder="more2"
            v-model="searchModel.more2">
          </el-input>
        </el-form-item>
        <el-form-item label="注册时间" prop="create_time">
          <el-date-picker
            v-model="searchModel.created_at"
            type="datetimerange"
            value-format="yyyy-MM-dd HH:mm:ss"
            range-separator="-"
            start-placeholder="开始时间"
            end-placeholder="结束时间">
          </el-date-picker>
        </el-form-item>
      </template>
    </vue-table>
  </el-row>
</template>

<script>
  export default {
    name: "Users",
    data() {
      return {
        searchModel: {
          name: '',
          email: '',
          phone: '',
          age: '',
          more1: '',
          more2: '',
          create_time: [],
        },
        fields: [
          {
            label: '#',
            key: 'id',
            sortable: true,
            width: 80,
            fixed: 'left',
          },
          {
            label: '头像',
            key: 'avatar',
            width: 80,
            template: avatar => {
              return '<img src="' + avatar + '" style="width: 40px; height: 40px; border-radius: 50%;">'
            },
            fixed: 'left',
          },
          {
            label: '姓名',
            key: 'name',
            width: 120,
            fixed: 'left',
          },
          {
            label: '邮箱',
            key: 'email',
            width: 200,
          },
          {
            label: '手机',
            key: 'phone',
            width: 120,
          },
          {
            label: '年龄',
            key: 'age',
            width: 100,
            sortable: true,
          },
          {
            label: '地址',
            key: 'address',
          },
          {
            label: '注册时间',
            key: 'create_time',
          },
        ],
        itemActions: [
          {
            action: 'info',
            label: '详情',
            type: 'success',
          },
          {
            action: 'edit',
            label: '编辑',
            type: 'primary',
          },
          {
            action: 'mark',
            label: '备注',
            type: 'info',
          },
        ],
      }
    },
    created() {

    },
    mounted() {

    },
    methods: {
      tableActions(action, item) {
        let that = this
        that[action + 'Action'](item)
      },
      infoAction(item) {
        this.$router.push({path: '/admin/user/' + item.id})
      },
      editAction(item) {
      },
      markAction(item) {
      },
    },
  }
</script>

<style scoped>

</style>
