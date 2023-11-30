<div class="container-fluid bg-white p-3 d-flex align-items-center justify-content-between shadow sticky-top">
  <h3 class="mb-0 h-font">RESINDA HOTEL</h3>
  <a href="logout.php" class="btn btn-primary btn-sm">LOG OUT</a>
</div>

<div class="col-lg-2 border-secondary shadow bg-white" id="dashboard-menu">
  <nav class="navbar navbar-expand-lg navbar-secondary">
    <div class="container-fluid flex-lg-column align-items-stretch">
      <h4 class="mt-2 fw-bold">ADMIN PANEL</h4>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link mb-2" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <button class="btn text-primary px-3 w-100 shadow-none text-start d-flex text-align-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#bookingLinks" >
              <span>Bookings</span>
              <span><i class="bi bi-caret-down-fill"></i></span>
            </button>
            <div class="collapse show px-3 small mb-1" id="bookingLinks">
              <ul class="nav nav-pills flex-column rounded border border-primary ">
                <li class="nav-item">
                  <a class="nav-link" href="new_bookings.php">New Bookins</a>
                </li>
              </ul>
              <ul class="nav nav-pills flex-column rounded border border-primary mt-2">
                <li class="nav-item">
                  <a class="nav-link" href="booking_records.php">Booking Records</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-2" href="users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-2" href="user_queries.php">User Queries</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-2" href="rate_review.php">Ratings & Reviews</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-2" href="facility.php">Facility</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-2" href="rooms.php">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-2 shadoww" href="settings.php">Settings</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>