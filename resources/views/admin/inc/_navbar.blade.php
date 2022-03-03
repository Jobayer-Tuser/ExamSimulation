<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <!-- Dashboard Menu Start -->
            <li class="navigation-header"><span>General</span><i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
            </li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}" class="nav-item"><a href="{{ route('dashboard') }}"><i class="feather icon-airplay"></i><span class="menu-title" data-i18n="Email Application">Dashboard</span></a>
            </li>
            <!-- Dashboard Menu End -->

            <!-- Admin Menu Start -->
            <li class=" nav-item"><a href="javascript::void"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Dashboard">Admin</span><span class="badge badge badge-primary badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('admintype') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admintype.index') }}" data-i18n="CRM">Admin Type</a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="{{ Request::is('admin') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.index') }}" data-i18n="CRM">Admin</a>
                    </li>
                </ul>
            </li>
            <!-- Admin Menu End -->

            <!-- Slider Menu Start -->
            <li class=" nav-item"><a href="#"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Calender">Slider</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('slidergroup')  ? 'active' : '' }}" ><a class="menu-item" href="{{ route('slidergroup.index') }}" data-i18n="Full Calender Basic">Slider Group</a>
                    </li>
                    <li class="{{ Request::is('slider') ? 'active' : '' }}" ><a class="menu-item" href="{{ route('slider.index') }}" data-i18n="Full Calender Events"> Slider </a>
                    </li>
                </ul>
            </li>
            <!-- Slider Menu End -->

             <!-- Category Menu Start -->
             <li class=" nav-item"><a href="#"><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="Calender">Category</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('category') ? 'active' : '' }}" ><a class="menu-item" href="{{ route('category.index') }}" data-i18n="Full Calender Basic">Category</a>
                    </li>
                </ul>
            </li>
            <!-- Category Menu End -->


            <li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
            </li>

            <!-- Question Menu Start -->
            <li class=" nav-item"><a href="#"><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="Calender">Question</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('question') ? 'active' : '' }}" ><a class="menu-item" href="{{ route('question.index') }}" data-i18n="Full Calender Basic">Question</a>
                    </li>
                </ul>
            </li>
            <!-- Question Menu End -->

             <!-- An Menu Start -->
             <li class=" nav-item"><a href="#"><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="Calender">Answer</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('answer') ? 'active' : '' }}" ><a class="menu-item" href="{{ route('answer.index') }}" data-i18n="Full Calender Basic">Answer</a>
                    </li>
                </ul>
            </li>
            <!-- Slider Menu End -->



        </ul>
    </div>
</div>
<!-- END: Main Menu-->