
<ul class="nav nav-pills">
    <li role="presentation" class="{{ Request::path() == 'admin/dashboard' ? 'active' : '' }}"><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
    <li role="presentation" class="{{ Request::path() == 'admin/users' ? 'active' : '' }}"><a href="{{route('admin_users')}}">Users</a></li>
    <li role="presentation" class="{{ Request::path() == 'admin/questions' ? 'active' : '' }}"><a href="{{route('admin_questions')}}">Questions</a></li>
    <li role="presentation" class="{{ Request::path() == 'admin/report' ? 'active' : '' }}"><a href="{{route('admin_report')}}">Report</a></li>
</ul>



