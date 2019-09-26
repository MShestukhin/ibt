import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import CompaniesIndex from '../components/cruds/Companies/Index.vue'
import CompaniesCreate from '../components/cruds/Companies/Create.vue'
import CompaniesShow from '../components/cruds/Companies/Show.vue'
import CompaniesEdit from '../components/cruds/Companies/Edit.vue'
import EmployeesIndex from '../components/cruds/Employees/Index.vue'
import EmployeesCreate from '../components/cruds/Employees/Create.vue'
import EmployeesShow from '../components/cruds/Employees/Show.vue'
import EmployeesEdit from '../components/cruds/Employees/Edit.vue'
import ActionsIndex from '../components/cruds/Actions/Index.vue'
import ActionsEdit from '../components/cruds/Actions/Edit.vue'
import ActionMembers from '../components/cruds/Reports/Action_members.vue'
import ActionFree from '../components/cruds/Reports/Action_free.vue'
import ErrProcessingBonus from '../components/cruds/Reports/Err_processing_bonus.vue'
import SmsMessegeMsisdn from '../components/cruds/Reports/SMS_messege_msisdn.vue'
import UsingTime from '../components/cruds/Reports/using_time.vue'
import Num_action_members from '../components/cruds/Reports/Num_action_members.vue'
import Msisdn_imei_detail from '../components/cruds/Reports/MSISDN_IMEI_detail.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/companies', component: CompaniesIndex, name: 'companies.index' },
    { path: '/companies/create', component: CompaniesCreate, name: 'companies.create' },
    { path: '/companies/:id', component: CompaniesShow, name: 'companies.show' },
    { path: '/companies/:id/edit', component: CompaniesEdit, name: 'companies.edit' },
    { path: '/employees', component: EmployeesIndex, name: 'employees.index' },
    { path: '/employees/create', component: EmployeesCreate, name: 'employees.create' },
    { path: '/employees/:id', component: EmployeesShow, name: 'employees.show' },
    { path: '/employees/:id/edit', component: EmployeesEdit, name: 'employees.edit' },
    { path: '/actions', component: ActionsIndex, name: 'actions.index' },
    { path: '/actions/:id/edit', component: ActionsEdit, name: 'actions.edit' },
    { path: '/reports/num_members', component: Num_action_members, name: 'reports.num_members' },
    { path: '/reports/action_free', component: ActionFree, name: 'reports.action_free' },
    { path: '/reports/act_members', component: ActionMembers, name: 'reports.act_members' },
    { path: '/reports/err_processing_bonus', component: ErrProcessingBonus, name: 'reports.err_bonus' },
    { path: '/reports/sms_message', component: SmsMessegeMsisdn, name: 'reports.sms_message' },
    { path: '/reports/using_time', component: UsingTime, name: 'reports.using_time' },
    { path: '/reports/msisdn_imei_detail', component: Msisdn_imei_detail, name: 'reports.msisdn_imei_detail' },
]

export default new VueRouter({
    mode: 'history',
    // base: '/admin',
    routes
})
