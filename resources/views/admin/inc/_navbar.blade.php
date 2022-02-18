<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <!-- Dashboard Menu Start -->
            <li class=" navigation-header"><span>Dasboard</span><i class="feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
            </li>
            <li class=" nav-item"><a href="javascript::void"><i class="feather icon-airplay"></i><span class="menu-title" data-i18n="Email Application">Dashboard</span></a>
            </li>
            <!-- Dashboard Menu End -->

            <!-- Admin Menu Start -->
            <li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
            </li>
            <li class=" nav-item"><a href="javascript::void"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Dashboard">Admin</span><span class="badge badge badge-primary badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admintype.index') }}" data-i18n="CRM">Admin Type</a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admin.index') }}" data-i18n="CRM">Admin List</a>
                    </li>
                </ul>
            </li>
            <!-- Admin Menu End -->

            <!-- Slider Menu Start -->
            <li class=" nav-item"><a href="#"><i class="feather icon-plus-square"></i><span class="menu-title" data-i18n="Calender">Slider</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('slidergroup.index') }}" data-i18n="Full Calender Basic">Slider Group</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('slider.index') }}" data-i18n="Full Calender Events">Slider</a>
                    </li>
                    <li><a class="menu-item" href="full-calender-advance.html" data-i18n="Full Calender Advance">Full Calender Advance</a>
                    </li>
                    <li><a class="menu-item" href="full-calender-extra.html" data-i18n="Full Calender Extra">Full Calender Extra</a>
                    </li>
                </ul>
            </li>
            <!-- Slider Menu End -->



        </ul>
    </div>
</div>
<!-- END: Main Menu-->