
<ul class="nav nav-pills">
    <li role="presentation" class="{{ Request::path() == 'admin' ? 'active' : '' }}"><a href="{{route('admin')}}">Users</a></li>
    <li role="presentation" class="{{ Request::path() == 'admin-questions' ? 'active' : '' }}"><a href="{{route('admin_questions')}}">Questions</a></li>
</ul>



