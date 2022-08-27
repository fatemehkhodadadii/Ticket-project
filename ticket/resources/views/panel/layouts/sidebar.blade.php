@php
function activeSideRoute(array $items)
{
    $route = Route::current()->uri;
    $data = [];
    foreach ($items as $key => $value) {
        $data[] = "panel/".$value;
    }
    if (in_array($route, $data)) {
        return true;
    } else {
        return false;
    }
}
@endphp
@if (Gate::allows('Admin'))
    <!-- begin::Admin navigation -->
    <div class="navigation">
        <div class="navigation-icon-menu" id="navigation-icon-menu">
            <ul>
                <li class="{{ activeSideRoute(['panel', 'category', 'category/create', 'category/{category}/edit', 'users', 'users/create', 'users/{user}/edit']) ? 'active' : '' }}"
                    data-toggle="tooltip" title="داشبورد">
                    <a href="#navigationDashboards" title="داشبوردها">
                        <i class="fas fa-home icon"></i>
                    </a>
                </li>
                <li class="{{ activeSideRoute(['tickets', 'tickets/{ticket}/edit', 'tickets/{id}/create']) ? 'active' : '' }}"
                    data-toggle="tooltip" title="پشتیبانی">
                    <a href="#navigationApps" title="پشتیبانی">
                        <i class="far fa-comments icon"></i>
                    </a>
                </li>
            </ul>
            <ul>
                <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                    @csrf
                    <li data-toggle="tooltip" title="خروج">
                        <a onclick="event.preventDefault();document.getElementById('logoutForm').submit()" href=""
                            class="go-to-page">
                            <i class="fas fa-power-off icon"> </i>
                        </a>
                    </li>
                </form>
            </ul>
        </div>
        <div class="navigation-menu-body">
            <ul id="navigationDashboards"
                class="{{ activeSideRoute(['panel', 'category', 'category/create', 'category/{category}/edit', 'users', 'users/create', 'users/{user}/edit']) ? 'navigation-active' : '' }}">
                <li class="navigation-divider">داشبورد</li>
                <li>
                    <a class="{{ activeSideRoute(['panel']) ? 'active' : '' }}" href="{{ route('panel') }}">پنل</a>
                </li>
                <li>
                    <a class="{{ activeSideRoute(['users', 'users/{user}/edit']) ? 'active' : '' }}"
                        href="{{ route('users.index') }}">کاربران</a>
                </li>
                <li>
                    <a class="{{ activeSideRoute(['users/create']) ? 'active' : '' }}"
                        href="{{ route('users.create') }}">ایجاد کاربر</a>
                </li>
            </ul>
            <ul id="navigationApps"
                class="{{ activeSideRoute(['tickets', 'tickets/{ticket}/edit', 'tickets/{id}/create', 'emailBox', 'comments', 'comments/{comment}', 'contacts', 'contacts/{contact}']) ? 'navigation-active' : '' }}">
                <li class="navigation-divider">پشتیبانی</li>
                <li>
                    <a class="{{ activeSideRoute(['tickets', 'tickets/{ticket}/edit', 'tickets/{id}/create']) ? 'active' : '' }}"
                        href="{{ route('tickets.index') }}">تیکت ها</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end::Admin navigation -->
@elseif(Gate::allows('User'))
    <!-- begin::User navigation -->
    <div class="navigation">
        <div class="navigation-icon-menu" id="navigation-icon-menu">
            <ul>
                <li class="{{ activeSideRoute(['panel', 'category', 'category/create', 'category/{category}/edit', 'tags', 'tags/create', 'tags/{tag}/edit', 'users', 'users/create', 'users/{user}/edit', 'profile/{id?}', 'payments', 'invoice/{id}']) ? 'active' : '' }}"
                    data-toggle="tooltip" title="داشبورد">
                    <a href="#navigationDashboards" title="داشبوردها">
                        <i class="fas fa-home icon"></i>
                    </a>
                </li>
                <li class="{{ activeSideRoute(['tickets', 'tickets/{ticket}/edit', 'tickets/{id}/create', 'emailBox', 'comments', 'comments/{comment}', 'contacts', 'contacts/{contact}']) ? 'active' : '' }}"
                    data-toggle="tooltip" title="پشتیبانی">
                    <a href="#navigationApps" title="پشتیبانی">
                        <i class="far fa-comments icon"></i>
                    </a>
                </li>
            </ul>
            <ul>
                <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                    @csrf
                    <li data-toggle="tooltip" title="خروج">
                        <a onclick="event.preventDefault();document.getElementById('logoutForm').submit()" href=""
                            class="go-to-page">
                            <i class="fas fa-power-off icon"> </i>
                        </a>
                    </li>
                </form>
            </ul>
        </div>
        <div class="navigation-menu-body">
            <ul id="navigationDashboards"
                class="{{ activeSideRoute(['panel']) ? 'navigation-active' : '' }}">
                <li class="navigation-divider">داشبورد</li>
                <li>
                    <a class="{{ activeSideRoute(['panel']) ? 'active' : '' }}"
                        href="{{ route('panel') }}">پنل</a>
                </li>
            </ul>
            <ul id="navigationApps"
                class="{{ activeSideRoute(['tickets', 'tickets/{ticket}/edit', 'tickets/{id}/create']) ? 'navigation-active' : '' }}">
                <li class="navigation-divider">پشتیبانی</li>
                <li>
                    <a class="{{ activeSideRoute(['tickets', 'tickets/{ticket}/edit']) ? 'active' : '' }}"
                        href="{{ route('tickets.index') }}">تیکت ها</a>
                </li>
                <li>
                    <a class="{{ activeSideRoute(['tickets/{id}/create']) ? 'active' : '' }}"
                        href="{{ route('tickets.createTicket',Auth::id()) }}">ایجاد تیکت</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end::User navigation -->
@endif
