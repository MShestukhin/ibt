@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <router-link :to="{ name: 'roles.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'users.index' }">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <router-link :to="{ name: 'companies.index' }">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.companies.title')</span>
                </router-link>
            </li><li>
                <router-link :to="{ name: 'employees.index' }">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.employees.title')</span>
                </router-link>
            </li> -->

            <li>
                <router-link :to="{ name: 'actions.index' }">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.actions.title')</span>
                </router-link>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">@lang('quickadmin.reports.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <router-link :to="{ name: 'reports.msisdn_imei_detail' }">
{{--                            <i class="fa fa-briefcase"></i>--}}
                            <span class="title">
                                @lang('quickadmin.reports.msisdn/imei_deteils')
                            </span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'reports.num_members' }">
{{--                            <i class="fa fa-user"></i>--}}
                            <span class="title">
                                @lang('quickadmin.reports.num_action_members')
                            </span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'reports.using_time' }">
{{--                            <i class="fa fa-user"></i>--}}
                            <span class="title">
                                @lang('quickadmin.reports.using_time')
                            </span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'reports.err_bonus' }">
{{--                            <i class="fa fa-user"></i>--}}
                            <span class="title">
                                @lang('quickadmin.reports.err_bonus')
                            </span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'reports.sms_message' }">
{{--                            <i class="fa fa-user"></i>--}}
                            <span class="title">
                                @lang('quickadmin.reports.sms_message')
                            </span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'reports.action_free' }">
{{--                            <i class="fa fa-user"></i>--}}
                            <span class="title">
                                @lang('quickadmin.reports.action_free')
                            </span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'reports.act_members' }">
{{--                            <i class="fa fa-user"></i>--}}
                            <span class="title">
                                @lang('quickadmin.reports.act_members')
                            </span>
                        </router-link>
                    </li>
                </ul>
            </li>

            <li>
                <router-link :to="{ name: 'auth.change_password' }">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </router-link>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

