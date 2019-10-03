<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Book Club</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Forum</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Books</a>
                </li>
            </ul>
            <div class="dropdown-divider"></div>
            <ul class="navbar-nav mr-3">
                <li class="nav-item">
                    <a data-toggle="modal" data-target="#login-modal" class="nav-link" href="#">Login</a>                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>
    @guest
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-dark">
                  <h5 class="modal-title text-white">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-md-9">
                        <form action="#">
                          <div class="row form-group">                          
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                              </div>
                              <input placeholder="Enter Username" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="row form-group">                          
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input placeholder="Enter Password" type="password" class="form-control">
                              </div>
                          </div>
                          <div class="row form-group">
                            <button class="btn btn-block btn-sm btn-dark"><span class="fa fa-sign-in"></span> Login</button>
                          </div>
                        </form>                        
                      </div>
                    </div>
                      
                  </div>
                      
                   
                </div>
                
              </div>
            </div>
          </div>
          @endguest