
@include($activeTemplate.'partials.headers')

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Assalam O Alaikum ({{ Auth::user()->firstname }} {{ Auth::user()->lastname }})</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Eagle Money Global</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 -->
                        <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="card-body">   
                        <!-- Code Here -->
                        <center><h2><strong style="color:MediumSeaGreen;">Change Your Password!</strong></h2></center>
                        
                        <form action="" method="post">
                            @csrf
                            
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form--control" name="current_password" required autocomplete="current-password">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form--control" name="password" required autocomplete="current-password">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form--control" name="password_confirmation" required autocomplete="current-password">
                                </div>
                            </div>

                        
                        <center><button tpye="submit" class="btn btn-primary">Confirm Edit</button></center>
                        </form>
                        
                        <!-- Code Here -->    
                        </div>    
                        </div>    
                        </div>
                        </div> 
                        <!-- ROW-1 END -->


                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>

@include($activeTemplate.'partials.footers')