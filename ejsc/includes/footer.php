  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modals -->

  <section>

  <div class="login-bg">
    <div class="row">
      <div class="col-5">
        <div class="modal fade" id="login_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-biru-tua">
                    <h5 class="modal-title font-m-bold ml-3" id="LoginLabel">Login User</h5>
                    <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-center">
                  <form class="font-m-light col-11 mt-3" action="cek_login_user.php" method="post">
                    <div class="form-group">
                      <label for="username-user" class="font-m-med">Username</label>
                      <input type="text" class="form-control" id="username-user" name="username-user" aria-describedby="usernameHelp" placeholder="Enter username" required>
                      
                    </div>
                    <div class="form-group">
                      <label for="password-user" class="font-m-med">Password</label>
                      <input type="password" class="form-control tampil-sandi" id="password-user" name="password-user" placeholder="Password" required>
                      <small id="passwordHelp" class="form-text float-right"><a href="forgot_password.php">Lupa password?</a></small>
                      <div class="form-group form-check float-left">
                        <input type="checkbox" class="form-check-input" id="tampil-sandi">
                        <label class="form-check-label" for="tampil-sandi"><small>Tampilkan Sandi</small></label>
                      </div>
                    </div>
                  
                </div>
                <div class="modal-footer text-center">
                    <input type="submit" class="btn btn-primary" name="login_admin" value="Login">
                </div>
              </div>
              </form>
          </div>
      </div>
      </div>
    </div>
  </div>

  </section>

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
  <script src="js/agency.js"></script>

</body>

</html>
