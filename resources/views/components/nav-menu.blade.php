<nav id="nav-menu" class="text-white">
    <x-nav-menu-item name="Dashboard" route="dashboard" icon="dashboard"/>
    <x-nav-menu-submenu name="Clients" route="clients.index" icon="clients" active="clients.*">
        <x-nav-menu-sub-item name="Companies" route="clients.companies.index"/>
    </x-nav-menu-submenu>
    <x-nav-menu-item name="Profile" route="profile.show" icon="profile"/>
</nav>
