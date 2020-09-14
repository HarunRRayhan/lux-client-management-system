<nav id="nav-menu" class="text-white">
    <x-nav-menu-item name="Dashboard" route="dashboard" icon="dashboard"/>
    <x-nav-menu-submenu name="Clients" route="clients.companies.create" icon="clients" active="clients.*">
        <x-nav-menu-sub-item name="Company List" route="clients.companies.index"/>
        <x-nav-menu-sub-item name="Add Company" route="clients.companies.create"/>
        <x-nav-menu-sub-item name="Profile" route="profile.show"/>
    </x-nav-menu-submenu>
    <x-nav-menu-item name="Profile" route="profile.show" icon="profile"/>
</nav>
