@if (hasPermission('forum_read'))
    <li class="sidebar-menu-item {{ set_menu(['forum*']) }}">
        <a class="parent-item-content has-arrow">
            <i class="fa-solid fa-users-rays"></i>
            <span class="on-half-expanded">{{ ___('forum.Forum') }}</span>
            @if (env('APP_DEMO'))
                <span class="badge badge-danger text-white">{{ ___('addon.Addon') }}</span>
            @endif
        </a>
        <ul class="child-menu-list">
            @if (hasPermission('forum_category_read'))
                <li class="sidebar-menu-item {{ set_menu(['forum.category.index']) }}">
                    <a href="{{ route('forum.category.index') }}">{{ ___('forum.Forum Category') }}</a>
                </li>
            @endif
            @if (hasPermission('forum_read'))
                <li class="sidebar-menu-item {{ set_menu(['forum.admin.index']) }}">
                    <a href="{{ route('forum.admin.index') }}">{{ ___('forum.Manage Questions') }}</a>
                </li>
            @endif
        </ul>
    </li>
@endif
