<?php include("widgets_f/header.php"); ?>

        <!-- Mobile View Search Bar -->
        <div class="container-fluid product-search d-md-none d-sm-block">
            <form class="d-flex w-60 p-3 mx-auto" role="search">
            <input class="form-control me-2 search" type="search" placeholder="Search Somethig..." aria-label="Search">
            <button class="btn btn-outline-light search-btn" type="submit">Search</button>
            </form>
        </div>

        <!-- Contact Section -->
        <div class="container p-3"><br><br>
            <div class="row">
                <div class="col-md-6 p-3">
                    <div class="rounded-3 p-3 shadow">
                        <form class="row g-3">
                            <div class="col-md-12">
                                <label for="inputName" class="form-label text-dark">Name</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Enter Your Name Here...">
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail" class="form-label text-dark">Email</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="Enter Your Email Address Here...">
                            </div>

                            <div class="col-md-12">
                                <label for="textarea" class="form-label text-dark">Your Query</label>
                                <textarea class="form-control mt-3" id="textarea" placeholder="Leave Your Query Here..." style="height: 150px;"></textarea>    
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-40" type="submit">Send Mail</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 p-3">
                    <div class="card rounded-3 shadow">
                        <iframe class="p-1 rounded-3 w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.258222102658!2d96.4177378143114!3d22.903844626503936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37336156c3b2030f%3A0x935b34504e0ca266!2sLet&#39;s%20Learn%20Programming!5e0!3m2!1sen!2smm!4v1660477880228!5m2!1sen!2smm"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section -->
        
<?php include("widgets_f/footer.php"); ?>