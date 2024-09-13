<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LXNetDirector</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
        menu_item( "dashboard" , "Dashboard" );
        menu_item( "dhcp" , "Address" );
        menu_item( "dns" , "Names" );
        menu_item( "ntp" , "Time" );
        menu_item( "shares" , "Shares" );
        ?>
      </ul>
      <form class="form-inline" style="margin: 0px;">
        <button class="btn btn-outline-secondary" onclick="window.location='/settings'">Settings</button>
      </form>
    </div>
  </div>
</nav>