<div ng-controller="menuController as menuCtrl">
    <!-- START Menu -->
    <div class="start-menu" ng-show="menuCtrl.expanded"></div>
    <!-- END Menu -->
  
    <footer class="footer-menu">
        <button type="button" class="btn-start-menu" ng-click="menuCtrl.openMenu()">
            <img src="{{ asset('images/start.png') }}">
            <strong>{{__('pagination.start')}}</strong>
        </button>
        <div class="taskbar-right">
            <div title="" class="timer-menu" id="js-taskbar-time"></div>
        </div>
    </footer>

</div>


