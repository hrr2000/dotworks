<section class="footer">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 text-left d-flex flex-column gap-3">
                        <div>
                            <img src="{{ url('images/logo.png') }}" alt="{{ __('Dotworks Logo') }}">
                        </div>
                        <p class="desc">Dot.Works is a site that specializes in offering services of various kinds. Dot.Works provides you with the best conditions in terms of the highest degree of safety while dealing with merchants in  all transactions and service purchases.</p>
                        <p>
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-instagram"></i></a>
                            <a class="social" style="color:grey;cursor:not-allowed;"><i class="fab fa-whatsapp"></i></a>
                            <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                        </p>
                        <p>&copy; 2020 Dot.works. All rights reserved.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <ul class="nav flex-column text-left text-light">
                            <li class="nav-item">
                                <h5>Categories</h5>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Graphic Design</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Marketting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Writting and Translation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Video Production</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Business Managemnt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Education and Courses</a>
                            </li>
                        </ul>
                        <br>
                        <ul class="nav flex-column text-left text-light">
                            <li class="nav-item">
                                <h5>Blogs</h5>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Work on the site</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Work Online</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Distance Learning</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <ul class="nav flex-column text-left text-light">
                            <li class="nav-item">
                                <h5>About Us</h5>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Part1#</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Part2#</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Part3#</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Part4#</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Part5#</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Part6#</a>
                            </li>
                        </ul>
                        <br>
                        <ul class="nav flex-column text-left text-light">
                            <li class="nav-item">
                                <h5>Contact Us</h5>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Common problems</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Meaning Continues</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6  text-left d-flex flex-column gap-3">
                        <div>
                            <h2 class="new-letter-h">News Letter</h2>
                            <hr>
                            <p>To follow the latest news and developments on the Dot.works website, enter your email here.</p>
                        </div>
                        <div class="news-field">
                            <form method="POST">
                                <input type="text" placeholder="Enter your Email">
                                <input type="submit" value="SUBSCRIBE">
                            </form>
                        </div>
                        <p class="d-flex justify-content-start gap-3">
                            <a href="#" class="payment-icon"><i class="fab fa-cc-paypal"></i></a>
                            <a href="#" class="payment-icon"><i class="fab fa-cc-visa"></i></a>
                            <a href="#" class="payment-icon"><i class="fab fa-cc-mastercard"></i></a>
                        </p>
                        @include('frontend.includes.locale-button')
                    </div>
                </div>
            </section>
