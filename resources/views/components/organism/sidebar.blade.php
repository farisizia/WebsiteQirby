<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class=" mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template/dist/img/logo.png')}}" class="elevation-3" alt="User Image" style="width: 220px; height: 100px">
        </div>
      </div>
      <br>
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <x-molecules.m-dashboard></x-molecules.m-dashboard>
          <x-molecules.m-property></x-molecules.m-property>
          <x-molecules.m-schedule></x-molecules.m-schedule>
          <x-molecules.m-data-user></x-molecules.m-data-user>
        </ul>
      </nav>
    </div>